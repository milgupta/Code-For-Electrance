<?php 
    session_start();
    include("connection.php");
    include("functions.php");

    $user_data = check_login($con);

    // If not logged in, redirect to login page
    if(!$user_data) {
        header("Location: login.php");
        die;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Electrance</title>
    <link rel="icon" type="image/png" href="img/electrance-image.png">
    <link rel="stylesheet" href="css/pages.css">
</head>
<body>
<header>
        <div class="container">
            <div class="logo">
                <img src="img/icon.png" width="150" height="150" alt="Electrance Logo">
            </div>
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="studio.html">Use Today</a></li>
                    <li><a href="team.php">About Us</a></li>
                    <li><a href="support.php">Contact</a></li>
                    <li><a href="logout.php">Logout</a></li>
                </ul>
            </nav>
            <p>Hello, <i><b><?php echo $user_data['user_name']; ?></b></i></p>
        </div>
    </header>
    <main>
        <div class="contact-section">
            <h1>Contact Us</h1>
            <p>If you have any questions or need assistance, please contact us:</p>
            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSeUZ0kKAnkp2r1yHIpGdJC5a_XE6ghbBTx7v5wUYQpcen6q2g/viewform?embedded=true" width="640" height="876" frameborder="0" marginheight="0" marginwidth="0">Loading…</iframe>
        </div>
    </main>
</body>
</html>
