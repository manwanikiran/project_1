<?php
session_start(); // Start the session at the beginning

include 'config.php';

$result = $conn->query("SELECT * FROM rooms");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rooms - StayEase</title>
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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
            background-color: rgba(255, 255, 255, 0.8); /* Transparent background color */
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .content-box {
            margin-bottom: 30px;
        }

        h2 {
            color: #007bff;
            margin-bottom: 20px;
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
            font-size: 1.1em;
            color: #555555;
        }
 .logo {
            font-family: 'Pacifico', cursive;
            font-size: 3em;
            color: white;
            margin-bottom: 10px;
            animation:  2s infinite alternate;
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
                <?php while ($row = $result->fetch_assoc()): ?>
                    <li>
                        <div>
                            <strong>Room Number:</strong> <?= htmlspecialchars($row['room_number']) ?><br>
                            <strong>Type:</strong> <?= htmlspecialchars($row['room_type']) ?><br>
                            <strong>Price:</strong> $<?= htmlspecialchars($row['price']) ?><br>
                            <strong>Status:</strong> <?= htmlspecialchars($row['status']) ?>
                        </div>
                        <div>
                            <?php if ($row['status'] == 'Available'): ?>
                                <?php if (isset($_SESSION['user_id'])): ?>
                                    <form action="book_room.php" method="post">
                                        <input type="hidden" name="room_id" value="<?= $row['id'] ?>">
                                        <button type="submit" class="btn btn-primary">Book Now</button>
                                    </form>
                                <?php else: ?>
                                    <p><a href="login.php" class="btn btn-primary">Login to book</a></p>
                                <?php endif; ?>
                            <?php else: ?>
                                <span>Not Available</span>
                            <?php endif; ?>
                        </div>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

    
           <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
