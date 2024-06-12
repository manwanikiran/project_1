<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StayEase - Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #343a40;
            background-image: url('facilities.jpg'); /* Add your hotel image */
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

        .logo {
            font-family: 'Pacifico', cursive; /* Use a stylish font */
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            animation:  2s infinite alternate; /* Add a subtle glow animation */
        }

        @keyframes glow {
            from {
                text-shadow: 0 0 10px #ffc107, 0 0 20px #ffc107, 0 0 30px #ffc107; /* Initial shadow */
            }
            to {
                text-shadow: 0 0 20px #ffc107, 0 0 30px #ffc107, 0 0 40px #ffc107; /* Glowing effect */
            }
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
            margin-bottom: 100px;
        }

        .content-box {
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
            border-radius: 30px;
            box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
            padding: 50px;
            margin-bottom: 30px;
        }

        .lead {
            font-size: 2em;
            animation: pulse 2s infinite;
            margin-bottom: 30px;
            color: black;
            font-weight: bold;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 30px;
        }

        li {
            margin-bottom: 10px;
            background-color: #f2f2f2;
            padding: 15px;
            border-radius: 5px;
            font-size: 1.2em;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            transition: all 0.3s ease;
            font-size: 1.2em;
            padding: 12px 24px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #ffffff;
        }

        p {
            font-size: 1.2em;
            color: #000000;
            font-style: italic;
        }

        .subtext {
            font-size: 1em;
            color: #6c757d;
        }

        .img-fluid {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
            opacity: 0.8;
        }

        .col-md-6 {
            padding: 0 15px;
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
            <p class="lead">Welcome to StayEase</p>
            <p class="subtext">Experience luxury and comfort at StayEase hotels. Enjoy world-class facilities designed for your comfort and convenience.</p><br>
            <div class="row">
                <div class="col-md-6">
                    <ul>
                        <li>Stunning views from every room</li>
                        <li>Exceptional dining options with a variety of cuisines</li>
                        <li>Convenient locations in popular destinations worldwide</li>
                        <li>Professional and friendly staff dedicated to making your stay memorable</li>
                    </ul>
                    <p>Book your stay now and make your next trip unforgettable!</p>
                </div>
                <div class="col-md-6">
                    <img src="facilities.jpg" alt="Facilities Image" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and jQuery (place at the end of body for faster loading) -->
    <script src="https://code.jquery.com/jquery-3.
