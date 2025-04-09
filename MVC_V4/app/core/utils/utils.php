<?php

namespace core\utils;

class Utils {

    // Function to validate user input 
    public static function validateInput($data) {

        // Trim whitespace from the beginning and end of the input 
        $data = trim($data);

        // Remove backslashes from the input 
        $data = stripslashes($data);

        // Convert special characters to HTML entities 
        $data = htmlspecialchars($data);

        return $data;
    }
}