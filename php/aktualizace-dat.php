<?php 

require("../classes/Database.php");
require("../classes/Data.php");
require("../classes/Utilities.php");

$connection = Database::connectionDB();
$data = Data::getDataFromUrl();

$insertResult = Database::insertDataIntoDB($connection, $data);

if ($insertResult > 0) {
    echo "Data byly aktualizovány! <br>(Počet nových dat: $insertResult)";
} else {
    echo "Došlo k chybě při aktualizaci dat nebo data již existují!";
}


?>

<br>
<a href="../?ref=db-vypis">Jít zpět</a>