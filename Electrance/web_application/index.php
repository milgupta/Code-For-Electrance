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
    <title>Electrance - Home</title>
    <link rel="stylesheet" href="css/pages.css">
    <link rel="icon" type="image/png" href="img/electrance-image.png">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #1b1b1b;
            color: #fff;
        }
        .logo img:hover {
            transform: rotate(360deg);
        }
        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 50px;
            background: transparent; /* Remove the black background */
            padding-top: 200px; /* Add some padding to the section */
        }
        .hero-content h1 {
            font-size: 3em;
            color: #00eaff;
        }
        .highlight {
            color: #ff00ff;
        }
        .hero-content p {
            font-size: 1.5em;
            margin-top: 20px;
            max-width: 500px;
        }
        .cta-buttons {
            margin-top: 20px;
        }
        .cta-buttons a {
            display: inline-block;
            padding: 10px 20px;
            margin-right: 10px;
            background-color: #00eaff;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s ease, transform 0.3s ease;
        }
        .cta-buttons a:hover {
            background-color: #ff00ff;
            transform: scale(1.1);
        }
        .hero-image img {
            max-width: 400px;
            border-radius: 20px;
            transition: transform 0.3s ease;
        }
        .hero-image img:hover {
            transform: scale(1.05);
        }
        .features-section {
            background-color: #2c2c2c;
            padding: 50px 20px;
            border-radius: 20px;
            margin-top: 50px;
            box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.5);
        }
        .features-section h2 {
            text-align: center;
            color: #ff00ff;
            margin-bottom: 30px;
        }
        .feature-cards {
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap;
        }
        .feature-card {
            background-color: #1c1c1c;
            border-radius: 15px;
            padding: 20px;
            width: 30%;
            transition: transform 0.3s ease;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }
        .feature-card:hover {
            transform: scale(1.05);
        }
        .feature-card h3 {
            color: #00eaff;
            margin-bottom: 10px;
        }
        .feature-card p {
            color: #ccc;
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
        <div class="hero">
            <div class="hero-content">
                <h1>The Evolution of <span class="highlight">Music</span></h1>
                <p>Empowering music creators with innovative tools and an inclusive platform for composing, editing, and enhancing their music projects seamlessly.</p>
                <div class="cta-buttons">
                    <a href="studio.html" class="get-started">Start Now</a>
                    <a href="https://youtu.be/RopHyYvdfTM" target="_blank" class="watch-demo">Watch demo video</a>
                </div>
            </div>
            <div class="hero-image">
                <img src="img/electrance-image.png" alt="Hero Image">
            </div>
        </div>

        <section class="features-section">
            <h2>Features</h2>
            <div class="feature-cards">
                <div class="feature-card">
                    <h3><i>Tutorials:</i></h3>
                    <p>Step-by-step guides to help you master Electrance tools and features.</p>
                </div>
                <div class="feature-card">
                    <h3><i>Virtual Mouse & Keyboard Control:</i></h3>
                    <p>Ensuring all can make music with accessibility features.</p>
                </div>
                <div class="feature-card">
                    <h3><i>Music Recomender:</i></h3>
                    <p>A tool that detects your mood through your camera to inspire and recommend songs.</p>
                </div>
            </div>
        </section>              
    </main>
</body>
</html>
