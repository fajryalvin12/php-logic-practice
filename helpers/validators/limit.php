<?php
    function validatePenLimit ($arr) {
        $message = "";
        $count = 0;

        foreach ($arr as $item) {
            if ($item["name"] === "Pen") {
                $count++;
            }
        }

        if ($count > 5) {
            $message = "Cannot buy Pen more than 5";
        }

        return $message;
    }
?>