<?php
    function checkItemPrice ($items) {
        $message = "";

        foreach ($items as $item) {
            if ($item["price"] <= 0) {
                $message = "Price for item '{$item["name"]}' must be greater than 0";
            }
        }

        return $message;
    }
?>