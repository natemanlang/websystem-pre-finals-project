<?php
    // Function to sanitize input
    function clean_input($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    // Product prices
    $prices = [
        "Fried Chicken" => 250,
        "Spaghetti" => 80,
        "Burger" => 150,
        "French Fries" => 60,
        "Ice Cream" => 99,
        "Carbonara" => 200,
        "Cheeseburger" => 120,
        "Pizza" => 499,
        "Donut" => 350,
        "Chicken Inasal" => 130
    ];

    // Check if POST data exists
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $fname = clean_input($_POST['fname']);
        $lname = clean_input($_POST['lname']);
        $address = clean_input($_POST['address']);
        $contact = clean_input($_POST['contact']);
        $email = clean_input($_POST['email']);
        $payment = clean_input($_POST['payment']);
        $delivery = clean_input($_POST['delivery']);
        $notes = clean_input($_POST['notes']);

        $selected_products = isset($_POST['products']) && is_array($_POST['products']) ? $_POST['products'] : [];
        $raw_quantities = isset($_POST['quantities']) && is_array($_POST['quantities']) ? $_POST['quantities'] : [];

        $order_items = [];
        $total = 0;
        $error = "";

        foreach ($selected_products as $raw_product) {
            $product = clean_input($raw_product);

            if (!isset($prices[$product])) {
                continue;
            }

            $qty = 1;
            if (isset($raw_quantities[$product])) {
                $qty = (int) $raw_quantities[$product];
            }
            if ($qty < 1) {
                $qty = 1;
            }

            $subtotal = $prices[$product] * $qty;
            $total += $subtotal;

            $order_items[] = [
                'name' => $product,
                'price' => $prices[$product],
                'quantity' => $qty,
                'subtotal' => $subtotal
            ];
        }

        if (count($order_items) === 0) {
            $error = "Please select at least one product.";
        }

        // Add delivery fee if Express
        if ($error === "" && $delivery == "Express") {
            $total += 10;
        }

    } else {
        // Redirect if accessed directly
        header("Location: form.php");
        exit();
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Summary</title>
    <style>
        body { font-family: Arial; padding: 20px; }
        .summary { width: 500px; margin: auto; border: 1px solid #ddd; padding: 20px; }
        h2 { text-align: center; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { text-align: left; padding: 8px; border-bottom: 1px solid #eee; }
        th { background: #fafafa; }
        .total { margin-top: 10px; }
    </style>
</head>
<body>
<div class="summary">
    <h2>Order Summary</h2>
    <p><strong>Name:</strong> <?= $fname . " " . $lname ?></p>
    <p><strong>Address:</strong> <?= $address ?></p>
    <p><strong>Contact:</strong> <?= $contact ?></p>
    <p><strong>Email:</strong> <?= $email ?></p>

    <?php if (!empty($error)): ?>
        <p style="color:#b00020;"><strong>Error:</strong> <?= $error ?></p>
        <p style="text-align:center;"><a href="form.php">Go back</a></p>
    <?php else: ?>
        <h3>Items</h3>
        <table>
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($order_items as $item): ?>
                    <tr>
                        <td><?= $item['name'] ?></td>
                        <td>₱<?= $item['price'] ?></td>
                        <td><?= $item['quantity'] ?></td>
                        <td>₱<?= $item['subtotal'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <p><strong>Payment Method:</strong> <?= $payment ?></p>
        <p><strong>Delivery Option:</strong> <?= $delivery ?></p>
        <p><strong>Additional Notes:</strong> <?= $notes ?: "None" ?></p>
        <h3 class="total">Total Amount: ₱<?= $total ?></h3>
        <p style="text-align:center;"><a href="form.php">Place Another Order</a></p>
    <?php endif; ?>
</div>
</body>
</html>