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

    // tambahan fitur v2.0
    // 1. validasi total amount atau jumlah belanjaan tidak boleh lebih dari $100 
    // solved => function validateAmount(), digunakan di line 74
    // 2. validasi price per item tidak boleh 0 atau kurang
    // solved => line 68-73
    // 3. check nama barang, jika namanya adalah invalid maka akan ada message penolakan
    // solved => line 74-76
    // tambahan fitur v3.0
    // memberikan validasi jumlah item "pen" yang dibeli oleh tiap customer agar tidak lebih dari 5 
    // solved => line 101-105, tambahan variabel $penCount untuk menampung setiap item pen dari iterasi array items
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
                        <?php if ($details["name"] === "Pen") : $penCount++ ?>
                            <?php if ($penCount > 5) : ?>
                                <p class="alert">Cannot buy Pen more than 5</p>
                            <?php endif ?>
                        <?php endif ?>
                        <p class="alert"><?= checkItemPrice($details["price"]) ?></p>
                        <p class="alert"><?= checkInvalid($details["name"]) ?></p>
                    </li>
            <?php endforeach ?>
        <p>Total : <?= "$" . number_format($totalAmount, 0, '.', ',') ?></p>
        <p class="alert"><?= validateAmount($totalAmount) ?></p>
        </ul>
    <?php endforeach ?>
</body>
</html>