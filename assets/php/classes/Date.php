<?php

class Date {
    
    public static function formatDate($date) {

        $formattedDate = str_replace('/', '.', $date);

        $timestamp = strtotime($formattedDate);

        if ($timestamp === false) {
            return "Neplatné datum";
        }

        $hasTime = strpos($formattedDate, ':') !== false;

        if (!$hasTime) {
            $dateFormat = "d. m. Y";
        } else {
            $dateFormat = "d. m. Y H:i:s";
        }

        return date($dateFormat, $timestamp);
    }
    
}