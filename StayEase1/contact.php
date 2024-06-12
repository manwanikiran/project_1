<?php
session_start(); // Start the session

require 'config.php'; // Include your database configuration
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - StayEase</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #343a40;
            background-image: url('hotel_booking.jpg'); /* Add your hotel image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
        }

        header {
            background-color: #343a40;
            color: #ffffff;
            padding: 20px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        h1 {
            font-size: 3em;
            margin: 0;
        }

        nav {
            background-color: #343a40;
            color: #ffffff;
            padding: 10px 0;
            text-align: center;
            margin-bottom: 30px;
        }

        nav a {
            color: #ffffff;
            text-decoration: none;
            margin: 0 15px;
            font-size: 18px;
            transition: all 0.3s ease;
        }

        nav a:hover {
            color: #ffc107;
        }

        .container {
            text-align: center;
            margin-bottom: 50px;
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
        }

        .lead {
            font-size: 1.5em;
            margin-bottom: 30px;
            animation: pulse 2s infinite;
            color: #007bff;
            font-weight: bold;
        }
            .experience {
            font-size: 1.3em;
            color: #555555;
            animation: pulse 2s infinite alternate;
        }


        p {
            font-size: 1.2em;
            color: #000000;
            font-style: italic;
        }
        
        .logo {
            font-family: 'Pacifico', cursive; /* Use a stylish font */
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            animation:  2s infinite alternate; /* Add a subtle glow animation */
        }

    </style>
</head>
<body>
    <header>
        <h1 class="logo">StayEase</h1>
    </header>
    <nav>
        <a href="index.php">Home</a>
        <a href="rooms.php">Rooms</a>
        <a href="facilities.php">Facilities</a>
        <a href="contact.php">Contact</a>
        <?php if (isset($_SESSION['user_id'])): ?>
            <a href="dashboard.php">My Dashboard</a>
            <a href="logout.php">Logout</a>
        <?php else: ?>
            <a href="login.php">Login</a>
            <a href="register.php">Register</a>
        <?php endif; ?>
    </nav>
    <div class="container">
        <div class="content-box">
            <h2>Contact Us</h2><br>
            <p class="experience">Experience unparalleled comfort and luxury with our world-class facilities designed to enhance your stay.</p><br>
            <p>Phone: 9904344081</p>
            <p>Email: contact@stayease.com</p>
            <p>Address: 123 Luxury Lane, Hotel Ease, Surat</p>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery (place at the end of body for faster loading) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
