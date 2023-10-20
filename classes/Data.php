<?php

class Data {
    
    public static function getDataFromUrl() {
        
        try {
            $url = "https://www.3it.cz/test/data/json";
            $data = file_get_contents($url);

            if (!$data) {
                throw new Exception("Chyba při stahování dat");
            } else {
                $decodedData = json_decode($data, true);
                return $decodedData;
            }
        } catch (Exception $e) {
            echo $e->getMessage();
            exit();
        }
    }
    
}