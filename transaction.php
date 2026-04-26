<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Process</title>
    <style>
        body {
            font-family: Arial;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .step {
            background: #f4f4f4;
            margin: 10px 0;
            padding: 15px;
            border-left: 5px solid #333;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Transaction Process</h2>

    <div class="step">
        <h3>1. Browse Products</h3>
        <p>Pumili ng item na gusto mong bilhin sa shop.</p>
    </div>

    <div class="step">
        <h3>2. Add to Cart</h3>
        <p>I-click ang "Add to Cart" para maidagdag ang item.</p>
    </div>

    <div class="step">
        <h3>3. Checkout</h3>
        <p>I-review ang iyong order bago mag proceed.</p>
    </div>

    <div class="step">
        <h3>4. Payment</h3>
        <p>Pumili ng payment method (GCash, COD, etc).</p>
    </div>

    <div class="step">
        <h3>5. Delivery</h3>
        <p>Hintayin ang delivery ng iyong order.</p>
    </div>

</div>

</body>
</html>
