<?php
    $orders = [
        [
            "customer" => "Fajry",
            "items" => [
                [ "name" => "laptop", "price" => 30 ],
                [ "name" => "mouse", "price" => 5 ],
                [ "name" => "keyboard", "price" => 3 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
            ]
        ],
        [
            "customer" => "Alvin",
            "items" => [
                [ "name" => "PC", "price" => 35 ],
                [ "name" => "mouse", "price" => 5 ],
                [ "name" => "headset", "price" => 2 ]    
            ]
        ],
        [
            "customer" => "John",
            "items" => [
                [ "name" => "Book", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ]            
            ]
        ],
    ];

    function validateAmount ($totalAmount) {
        $message = "";

        if ($totalAmount > 100) {
            $message = "Cannot purchase the items exceed $100";
        }

        return $message;
    }

    function checkItemPrice ($price) {
        $message = "";

        if ($price <= 0) {
            $message = "Each item price must be greater than 0";
        }

        return $message;
    }

    function checkInvalid ($itemName) {
        $message = "";

        if ($itemName === "Invalid"){
            $message = "prohibited to order invalid items";
        }

        return $message;
    }

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

    // tambahan fitur v4.0
    // refactor logic business jadi function supaya reusable 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order Summary With Validation</title>
    <style>
        .alert{
            color: red;
        }
    </style>
</head>
<body>
    <h2>Soal Kedua</h2>

    <?php foreach ($orders as $order ) : $penCount = 0; ?>
        <p>Customer Name : <?= $order["customer"] ?></p>
        <ul>
            <?php
                $totalAmount = 0; 
                foreach ($order['items'] as $details) :
                $totalAmount += $details['price'];
                 ?>
                    <li>
                        <?= $details["name"] ?> - <?= $details["price"] ?>
                    </li>
                    <p class="alert"><?= checkItemPrice($details["price"]) ?></p>
                    <p class="alert"><?= checkInvalid($details["name"]) ?></p>
            <?php endforeach ?>
        <p>Total : <?= "$" . number_format($totalAmount, 0, '.', ',') ?></p>
        <p class="alert"><?= validateAmount($totalAmount) ?></p>
        <p class="alert"><?= validatePenLimit($order["items"]) ?></p>
        </ul>
    <?php endforeach ?>
</body>
</html>


