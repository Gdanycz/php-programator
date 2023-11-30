<?php 

require("classes/Database.php");
require("classes/Data.php");

$connection = Database::connectionDB();

$deleteResult = Database::removeDataFromDB($connection);

if ($deleteResult > 0) {
    echo "Data byly smazány! <br>(Počet smazaných dat: $deleteResult)";
} else {
    echo "Došlo k chybě při smazání dat nebo data již neexistují!";
}


?>

<br>
<a href="../../?ref=db-vypis">Jít zpět</a>