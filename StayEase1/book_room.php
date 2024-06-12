
<?php
session_start(); // Start the session

require 'config.php'; // Include your database configuration

if (!isset($_SESSION['user_id'])) {
    // If the user is not logged in, redirect them to the login page
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Handle room booking logic
    $room_id = $_POST['room_id'];
    $user_id = $_SESSION['user_id'];

    // Check if the room is available
    $stmt = $conn->prepare("SELECT status FROM rooms WHERE id = ?");
    $stmt->bind_param("i", $room_id);
    $stmt->execute();
    $stmt->bind_result($status);
    $stmt->fetch();
    $stmt->close();

    if ($status == 'Available') {
        // Update room status to booked
        $stmt = $conn->prepare("UPDATE rooms SET status = 'Booked', user_id = ? WHERE id = ?");
        $stmt->bind_param("ii", $user_id, $room_id);
        $stmt->execute();
        $stmt->close();

        $message = "Room successfully booked!";
        
        // Get room details
        $stmt = $conn->prepare("SELECT room_number, room_type, price FROM rooms WHERE id = ?");
        $stmt->bind_param("i", $room_id);
        $stmt->execute();
        $stmt->bind_result($room_number, $room_type, $price);
        $stmt->fetch();
        $stmt->close();
    } else {
        $message = "Room is not available.";
    }
}

$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Book Room - StayEase</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            color: #343a40;
            background-image: url('hotel_booking.jpg'); /* Replace 'hotel_image.jpg' with your image file */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        }

        header, nav {
            position: relative;
            z-index: 1;
        }

        .container {
            position: relative;
            z-index: 2;
        }

        header {
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
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
            background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent black background */
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

        .content-box {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent white background */
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

        ul {
            list-style-type: none;
            padding: 0;
            margin-bottom: 30px;
        }

        li {
            margin-bottom: 10px;
            background-color: #f2f2f2;
            padding: 10px;
            border-radius: 5px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            color: #ffffff;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #ffffff;
        }

        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1);
            }
            100% {
                transform: scale(1);
            }
        }
        .logo {
            font-family: 'Pacifico', cursive; /* Use a stylish font */
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            animation:  2s infinite alternate; /* Add a subtle glow animation */
        }

        .success {
            color: green;
        }

        .error {
            color: red;
        }

        /* Room details style */
        .room-details {
            background-color: rgba(255, 255, 255, 0.9); /* Semi-transparent white background */
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .room-details h3 {
            color: black;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .room-details ul {
            list-style: none;
            padding: 0;
        }

        .room-details li {
            margin-bottom: 10px;
            background-color: #ffffff;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .room-details li strong {
            color: #555;
            margin-right: 5px;
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
            <h2>
            <?php if (!empty($message)): ?>
                <p class="<?= $status == 'Available' ? 'success' : 'error' ?>"><?= htmlspecialchars($message) ?></p>
                <?php if ($status == 'Available'): ?></h2>
                    <div class="room-details">
                        <h3>Room Details</h3>
                        <ul>
                            <li><strong>Room Number:</strong> <?= $room_number ?></li>
                            <li><strong>Room Type:</strong> <?= $room_type ?></li>
                            <li><strong>Price:</strong> $<?= $price ?></li>
                        </ul>
                    </div>
                <?php endif; ?>
            <?php endif; ?>
            
        </div>
    </div>
    <!-- Bootstrap JS and jQuery (place at the end of body for faster loading) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>


