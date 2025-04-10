<?php
    function validatePenAll ($array) {
        $message = "";
        $penCount = 0;

        foreach($array as $arr) {
            $result = $arr["items"];
            foreach($result as $item) {
                if ($item["name"] === "Pen") {
                $penCount++;
                }
            }
        }

        if ($penCount > 5) {
            $message = "Cannot buy Pen more than 5, you have $penCount";
        }

        return $message;
    }
?>