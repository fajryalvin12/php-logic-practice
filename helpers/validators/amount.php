<?php
    function validateAmount ($totalAmount) {
        $message = "";
        
        if ($totalAmount > 100) {
            $message = "Cannot purchase the items exceed $100";
        }

        return $message;
    }
?>