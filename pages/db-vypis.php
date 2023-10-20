<?php 

$connection = Database::connectionDB();
$data = Database::getDataFromDB($connection);

?>

<div class="container py-5">
    <h1 class="text-center text-light pb-3">Výpis dat z databáze</h1>

    <div class="table-responsive">
        <table class="table table-dark table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Jméno</th>
                    <th scope="col">Příjmení</th>
                    <th scope="col">Datum</th>
                </tr>
            </thead>
            <tbody>
                <?php 

                if (!empty($data)) {
                    foreach($data as $one_data) {
                        echo "
                        <tr>
                            <td>{$one_data["id"]}</td>
                            <td>{$one_data["jmeno"]}</td>
                            <td>{$one_data["prijmeni"]}</td>
                            <td>".Date::formatDate($one_data["datum"])."</td>
                        </tr>
                    ";
                    }
                } else {
                    echo "
                    <tr>
                        <td colspan='4'>Žádné záznamy</td>
                    </tr>";
                }
                

                ?>
            </tbody>
        </table>
        <p class="text-light ms-2">Zobrazeno <?= count($data); ?> záznamů</p>
    </div>
    <div class="text-center">
        <a href="php/aktualizace-dat.php" class="btn btn-primary">Aktualizovat data</a>
    </div>

</div>