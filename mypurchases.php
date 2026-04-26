<?php include "navbar.php"; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Transaction Process</title>

    <style>
        body {
            margin: 0;
            font-family: 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0a192f, #0f2a4d);
            color: #e6edf3;
        }

        .container {
    position: relative;
    max-width: 750px;
    margin: 60px auto;
    padding: 30px;
    border-radius: 15px;

    background: rgba(255, 255, 255, 0.04);
    backdrop-filter: blur(12px);

    border: 1px solid rgba(255, 255, 255, 0.1);

    box-shadow:
        0 10px 30px rgba(0,0,0,0.5),
        0 0 40px rgba(77, 163, 255, 0.1);

    overflow: hidden;
}

        h2 {
            text-align: center;
            margin-bottom: 40px;
            font-weight: 600;
            letter-spacing: 1px;
        }

        .timeline {
            position: relative;
            margin-left: 20px;
        }

        /* vertical line */
        .timeline::before {
            content: "";
            position: absolute;
            left: 15px;
            top: 0;
            width: 2px;
            height: 100%;
            background: #4da3ff;
            opacity: 0.3;
        }

        .step {
            position: relative;
            margin-bottom: 25px;
            padding-left: 50px;
        }

        /* circle indicator */
        .step::before {
            content: "";
            position: absolute;
            left: 6px;
            top: 5px;
            width: 18px;
            height: 18px;
            background: #4da3ff;
            border-radius: 50%;
            box-shadow: 0 0 10px #4da3ff;
        }

        .card {
            background: rgba(255, 255, 255, 0.05);
            padding: 18px 20px;
            border-radius: 10px;
            backdrop-filter: blur(6px);
            transition: 0.25s ease;
            border: 1px solid rgba(255,255,255,0.08);
        }

        .card:hover {
            transform: translateY(-3px);
            background: rgba(255, 255, 255, 0.08);
        }

        .card h3 {
            margin: 0;
            font-size: 16px;
            font-weight: 600;
            color: #ffffff;
        }

        .card p {
            margin-top: 6px;
            font-size: 14px;
            color: #b8c5d3;
        }

        /* subtle glow title */
        h2 span {
            color: #4da3ff;
        }

        /* responsive */
        @media (max-width: 600px) {
            .container {
                margin: 30px 15px;
            }
        }
    </style>
</head>

<body>

<div class="container">
  <h2><span>My</span> Purchases</h2>

  <div class="timeline">

    <div class="step active">
      <div class="card">
        <h3>1. Order Placed</h3>
        <p>Your order has been successfully placed.</p>
      </div>
    </div>

    <div class="step active">
      <div class="card">
        <h3>2. Order Confirmed</h3>
        <p>The store has confirmed your order and is now processing it.</p>
      </div>
    </div>

    <div class="step active">
      <div class="card">
        <h3>3. Preparing Items</h3>
        <p>Your items are being packed and prepared for shipping.</p>
      </div>
    </div>

    <div class="step">
      <div class="card">
        <h3>4. Shipped</h3>
        <p>Your order has been handed to the courier.</p>
      </div>
    </div>

    <div class="step">
      <div class="card">
        <h3>5. Out for Delivery</h3>
        <p>Your order is on the way to your address.</p>
      </div>
    </div>

    <div class="step">
      <div class="card">
        <h3>6. Delivered</h3>
        <p>Your order has been successfully delivered.</p>
      </div>
    </div>

  </div>
</div>

</body>
</html>


