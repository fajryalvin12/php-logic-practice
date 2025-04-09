<?php
    $orders = [
        [
            "customer" => "Fajry",
            "items" => [
                [ "name" => "laptop", "price" => 3000 ],
                [ "name" => "mouse", "price" => 500 ],
                [ "name" => "keyboard", "price" => 300 ]    
            ]
        ],
        [
            "customer" => "Alvin",
            "items" => [
                [ "name" => "PC", "price" => 3500 ],
                [ "name" => "mouse", "price" => 500 ],
                [ "name" => "headset", "price" => 250 ]    
            ]
        ],
        [
            "customer" => "John",
            "items" => [
                [ "name" => "Book", "price" => 500 ],
                [ "name" => "Pen", "price" => 100 ]            
            ]
        ],
    ]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Order Summary</title>
</head>
<body>
    <h2>Soal Pertama</h2>
    <?php foreach ($orders as $order ) : ?>
        <p>Customer Name : <?= $order["customer"] ?></p>
        <ul>
            <?php
                $totalAmount = 0; 
                foreach ($order['items'] as $details) :
                $totalAmount += $details['price'] ?>
            <?php endforeach ?>
        <p>Total : <?= number_format($totalAmount, 0, '.', ',') ?></p>
        </ul>
    <?php endforeach ?>
</body>
</html>