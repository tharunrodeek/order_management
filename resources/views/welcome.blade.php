<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Management System</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            background-image: url('https://cdn.prod.website-files.com/5f44e5cc8a89454e54bb7007/67405c8c9fd79dd2b27fa936_Complete%202024%20Guide%20to%20Purchase%20Order%20Management%20Systems.webp'); /* Replace with your image URL */
            background-size: cover;
            background-position: initial;
        }
        header {
            background-color: rgba(0, 0, 0, 0.6); /* Semi-transparent background */
            color: white;
            padding: 20px 0;
            text-align: center;
        }
        h1 {
            margin: 0;
        }
        .cta-btn, .auth-btn {
            background-color: #009688;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
            margin-right: 10px;
        }
        .auth-btn {
            background-color: #00796b; /* Different color for Register button */
        }
        .container {
            width: 80%;
            margin: 20px auto;
            text-align: center;
            color: white; /* White text to contrast with dark background */
        }
        footer {
            background-color: rgba(0, 0, 0, 0.8); /* Dark footer */
            color: white;
            padding: 10px;
            text-align: center;
            position: absolute;
            width: 100%;
            bottom: 0;
        }
        .auth-btn
        {
            padding: 24px 64px !important;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <h1>Order Management System</h1>
</header>

<!-- Main Content -->
<div class="container">
    <h2>Manage Your Orders with Ease</h2>
    <p>Efficiently upload, track, and manage all your orders in one place.</p>
    <a href="{{ route('login') }}" class="auth-btn">Log In</a>
    <a href="{{ route('register') }}" class="auth-btn">Register</a>
</div>

<!-- Footer -->
<footer>
    <p>&copy; 2024 Order Management Systemm</p>
</footer>

</body>
</html>
