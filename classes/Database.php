<?php


class Database {
    
    public static function connectionDB() {
        $db_host = "127.0.0.1";
        $db_user = "root";
        $db_password = "";
        $db_name = "3it";
        
        $connection = "mysql:host=$db_host;dbname=$db_name;charset=utf8";
        
        try {
            $db = new PDO($connection, $db_user, $db_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $db;
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }
    
    public static function insertDataIntoDB($connection, $data) {
        try {
            $insertedCount = 0;
            $sqlSelect = "SELECT id FROM zaznamy WHERE jmeno = :jmeno AND prijmeni = :prijmeni AND datum = :datum";
            $stmtSelect = $connection->prepare($sqlSelect);

            $sqlInsert = "INSERT INTO zaznamy (jmeno, prijmeni, datum) VALUES (:jmeno, :prijmeni, :datum)";
            $stmtInsert = $connection->prepare($sqlInsert);

            foreach ($data as $one_data) {
                $jmeno = $one_data["jmeno"];
                $prijmeni = $one_data["prijmeni"];
                $datum = $one_data["date"];

                $stmtSelect->bindParam(":jmeno", $jmeno, PDO::PARAM_STR);
                $stmtSelect->bindParam(":prijmeni", $prijmeni, PDO::PARAM_STR);
                $stmtSelect->bindParam(":datum", $datum, PDO::PARAM_STR);
                $stmtSelect->execute();

                if ($stmtSelect->rowCount() == 0) {
                    $stmtInsert->bindParam(":jmeno", $jmeno, PDO::PARAM_STR);
                    $stmtInsert->bindParam(":prijmeni", $prijmeni, PDO::PARAM_STR);
                    $stmtInsert->bindParam(":datum", $datum, PDO::PARAM_STR);

                    if ($stmtInsert->execute()) {
                        $insertedCount++;
                    }
                }
            }

            return $insertedCount;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    
    public static function getDataFromDB($connection) {
        try {
            $sql = "SELECT * FROM zaznamy ORDER BY datum ASC";
            $stmt = $connection->query($sql);

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $results;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    
}