<?php

require("classes/Database.php");
require("classes/Data.php");

$connection = Database::connectionDB();
$dbData = Database::getDataFromDB($connection);


if ($dbData > 0) {
    $data = Data::getDataFromUrl();
    $insertResult = Database::insertDataIntoDB($connection, $data);
    
    if ($insertResult > 0) {
        echo "Data byly aktualizovány! <br>(Počet nových dat: $insertResult)";
    } else {
        echo "Došlo k chybě při aktualizaci dat nebo data již existují!";
    }
} else {
    echo "Došlo k chybě při aktualizaci dat nebo data již existují!";
}



?>

<br>
<a href="../../?ref=db-vypis">Jít zpět</a>