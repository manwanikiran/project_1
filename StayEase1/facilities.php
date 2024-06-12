<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Facilities - StayEase</title>
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
            padding: 0;
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
            border-radius: 20px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            margin-bottom: 30px;
        }

        h3 {
            margin-bottom: 20px;
            color: #007bff;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 30px;
        }

        li {
            margin-bottom: 20px;
            background-color: #f2f2f2;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
        }

        li:hover {
            transform: translateY(-5px);
            box-shadow: 0px 6px 15px rgba(0, 0, 0, 0.2);
        }

        p {
            font-size: 1.1em;
            color: #555555;
        }

        .experience {
            font-size: 1.3em;
            color: #555555;
            animation: pulse 2s infinite alternate;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            100% {
                transform: scale(1.05);
            }
        }

        .logo {
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            animation:  2s infinite alternate;
        }

        @keyframes glow {
            0% {
                text-shadow: 0 0 10px #ffc107, 0 0 20px #ffc107, 0 0 30px #ffc107;
            }
            to {
                text-shadow: 0 0 20px #ffc107, 0 0 30px #ffc107, 0 0 40px #ffc107;
            }
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
        <p class="experience">Experience unparalleled comfort and luxury with our world-class facilities designed to enhance your stay.</p><br>
        <ul>
            <li>
                <h3>State-of-the-Art Fitness Center</h3>
                <p>Stay in shape during your stay with our modern fitness center equipped with the latest exercise machines and expert trainers.</p>
            </li>
            <li>
                <h3>Outdoor Swimming Pool with a View</h3>
                <p>Take a dip in our refreshing outdoor swimming pool while enjoying breathtaking views of the surrounding landscape.</p>
            </li>
            <li>
                <h3>Gourmet Restaurants and Bars</h3>
                <p>Indulge in a culinary journey at our gourmet restaurants and bars serving a variety of delicious dishes and refreshing beverages.</p>
            </li>
            <li>
                <h3>High-Speed Internet Access</h3>
                <p>Stay connected with complimentary high-speed internet access available throughout the hotel premises.</p>
            </li>
            <li>
                <h3>24-Hour Room Service</h3>
                <p>Enjoy the convenience of round-the-clock room service, allowing you to order delicious meals and snacks anytime you desire.</p>
            </li>
        </ul>
    </div>
</div>
<!-- Bootstrap JS and jQuery (place at the end of body for faster loading) -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
