<?php
    function checkInvalid ($items) {
        $message = "";

        foreach ($items as $item) {
            if ($item["name"] === "invalid"){
                $message = "prohibited to order invalid items";
            }
        }

        return $message;
    }
?>