<?php include 'header.php'; ?>

<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require 'config.php';

$user_id = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT b.id, r.room_number, r.room_type, b.check_in_date, b.check_out_date, b.status FROM bookings b JOIN rooms r ON b.room_id = r.id WHERE b.user_id = ?");
$stmt->bind_param("i", $user_id);
$stmt->execute();
$result = $stmt->get_result();

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - StayEase</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-image: url('hotel_booking.jpg'); /* Add your hotel image */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no-repeat;
            background-color: rgba(255, 255, 255, 0.9); /* Transparent white overlay */
            margin: 0;
            padding: 0;
            color: #343a40;
        }

        nav {
            background-color: rgba(52, 58, 64, 0.8); /* Transparent dark overlay for navigation */
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
            margin-bottom: 40px;
        }

        .dashboard {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .booking-card {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            width: 350px;
            transition: all 0.3s ease;
        }

        .booking-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.2);
        }

        .booking-card h3 {
            color: #007bff;
            margin-bottom: 10px;
            font-size: 1.5rem;
        }

        .booking-card p {
            margin: 10px 0;
        }

        .booking-card strong {
            font-weight: bold;
            color: #555;
        }

        .message {
            font-size: 1.2rem;
            margin-bottom: 10px;
        }

        .success-message {
            color: green;
        }

        .error-message {
            color: red;
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
        <a href="rooms.php">View Rooms</a>
        <a href="logout.php">Logout</a>
    </nav>
    <div class="container">
        <h2>Your Dashboard</h2>
        <?php if ($result->num_rows > 0): ?>
            <div class="message success-message">You have <?= $result->num_rows ?> booking(s) in total.</div>
            <div class="dashboard">
                <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="booking-card">
                        <h3>Booking Details</h3>
                        <p><strong>Room Number:</strong> <?= htmlspecialchars($row['room_number']) ?></p>
                        <p><strong>Type:</strong> <?= htmlspecialchars($row['room_type']) ?></p>
                        <p><strong>Check-in Date:</strong> <?= htmlspecialchars($row['check_in_date']) ?></p>
                        <p><strong>Check-out Date:</strong> <?= htmlspecialchars($row['check_out_date']) ?></p>
                        <p><strong>Status:</strong> <?= htmlspecialchars($row['status']) ?></p>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <div class="message error-message">You haven't made any bookings yet. <a href="rooms.php">Book a room now!</a></div>
        <?php endif; ?>
    </div>
</body>
</html>
