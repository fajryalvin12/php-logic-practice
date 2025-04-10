<?php
    require("../php_logic_practice/helpers/functions.php");

    $orders = [
        [
            "customer" => "Fajry",
            "items" => [
                [ "name" => "laptop", "price" => 30 ],
                [ "name" => "mouse", "price" => 5 ],
                [ "name" => "keyboard", "price" => 3 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ]
            ]
        ],
        [
            "customer" => "Alvin",
            "items" => [
                [ "name" => "PC", "price" => 35 ],
                [ "name" => "mouse", "price" => 5 ],
                [ "name" => "headset", "price" => 2 ],
                [ "name" => "Pen", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
            ]
        ],
        [
            "customer" => "John",
            "items" => [
                [ "name" => "Book", "price" => 5 ],
                [ "name" => "Pen", "price" => 5 ],
            ]
        ],
    ];

    // tambahan fitur v4.2
    //  pindah logic validasi ke dalam folder yang berbeda, dan diekspor ke file inti
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
        <p><strong>Customer Name :</strong> <?= $order["customer"] ?></p>
        <ul>
            <?php
                $totalAmount = 0; 
                foreach ($order['items'] as $details) :
                $totalAmount += $details['price'];
                 ?>
                    <li>
                        <?= $details["name"] ?> - <?= $details["price"] ?>
                    </li>
            <?php endforeach ?>
            <p>Total : <?= "$" . number_format($totalAmount, 0, '.', ',') ?></p>
            <p class="alert"><?= validateAmount($totalAmount) ?></p>
        </ul>
    <?php endforeach ?>
    
    <p class="alert"><?= validatePenAll($orders)?></p>
    <p class="alert"><?= checkItemPrice($order["items"]) ?></p>
    <p class="alert"><?= checkInvalid($order["items"]) ?></p>
    <p class="alert"><?= validatePenLimit($order["items"]) ?></p>
</body>
</html>


