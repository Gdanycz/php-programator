<?php 

$ref = ($_GET["ref"]) ?? "json-vypis";

require("assets/php/classes/Database.php");
require("assets/php/classes/Data.php");
require("assets/php/classes/Date.php");

?>


<!DOCTYPE html>
<html lang="cs">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>PHP programátor</title>
    <meta name="description" content="PHP Programátor">
    <meta name="keywords" content="PHP Programátor">
    <meta name="author" content="Gdany">
    <meta name="theme-color" media="(prefers-color-scheme: light)" content="white">
    <meta name="theme-color" media="(prefers-color-scheme: dark)" content="black">
    <meta name=”robots” content="noindex, nofollow">
    <!-- Favicons -->
    <link href="assets/img/logo.png" rel="icon">
    <link href="assets/img/logo.png" rel="apple-touch-icon">
    <!--  Bootstrap -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <!--  Custom styles -->
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container-fluid">
                <a href="#" class="navbar-brand">Gdany</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?= ($ref=='json-vypis') ? 'active' : ''; ?>" href="?ref=json-vypis">Home (json výpis)</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?= ($ref=='db-vypis') ? 'active' : ''; ?>" href="?ref=db-vypis">DB výpis</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main class="bg-secondary">
        <?php 
        
        if($ref == NULL) {
            include('pages/home.php');
        } else {
            if(!include('pages/'.$ref.'.php')) {
                include("pages/not-found.php");
            }
        }
        
        ?>
    </main>

    <footer class="bg-dark text-center">
        <div class="text-center p-3 text-light">
            © 2023 PHP Programátor | Created by 
            <a href="https://me.gdany.eu/" class="text-secondary text-decoration-none">Gdany</a>
        </div>
    </footer>

    <!--  JQuery -->
    <script src="assets/js/jquery.min.js"></script>
    <!--  Bootstrap -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!--  Custom js -->
    <script src="assets/js/main.js"></script>
</body>

</html>