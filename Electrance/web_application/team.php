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
    <title>Electrance - About Us</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/pages.css">
    <link rel="icon" type="image/png" href="img/electrance-image.png">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111111;
            color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        .about-us {
            margin-top: 200px;
            background: linear-gradient(135deg, #1a1a1a, #333);
            padding: 50px;
            border-radius: 20px;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            transition: background-color 0.5s;
        }

        .about-us:hover {
            background: linear-gradient(135deg, #1a1a1a, #444);
        }

        .profile-img {
            border-radius: 50%;
            width: 150px;
            height: 150px;
            margin: 0 auto 20px auto;
            display: block;
            box-shadow: 0px 4px 15px rgba(0, 0, 0, 0.2);
            transition: transform 0.5s ease;
            object-fit: cover;
        }

        .profile-img:hover {
            transform: scale(1.5);
        }

        h2 {
            font-size: 36px;
            margin-bottom: 20px;
            color: #00FFFF;
        }

        .description {
            font-size: 18px;
            line-height: 1.6;
            max-width: 800px;
            margin: 20px auto;
            text-align: justify;
            color: #e6e6e6;
        }

        .highlight {
            color: #00FFFF;
        }
    </style>
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
        <section class="about-us">
            <img src="img/avatar.jpeg" alt="Profile Picture" class="profile-img">
            <h2>About Us</h2>
            <p class="description">
                Welcome to <span class="highlight">Electrance Studio</span>. We are a team of passionate music creators and developers dedicated to providing the best tools and platform for electronic music production. Our mission is to empower music creators worldwide by offering an inclusive, innovative, and seamless environment for composing, editing, and enhancing their music projects.
            </p>
        </section>              
    </main>
</body>

</html>
