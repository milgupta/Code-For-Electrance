<?php 
session_start();
include("connection.php");
include("functions.php");

$error_message = ""; // Variable to hold the error message

if($_SERVER['REQUEST_METHOD'] == "POST")
{
    //something was posted
    $user_name = $_POST['user_name'];
    $password = $_POST['password'];

    if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
    {
        //read from database
        $query = "select * from users where user_name = '$user_name' limit 1";
        $result = mysqli_query($con, $query);

        if($result)
        {
            if($result && mysqli_num_rows($result) > 0)
            {
                $user_data = mysqli_fetch_assoc($result);
                
                if($user_data['password'] === $password)
                {
                    $_SESSION['user_id'] = $user_data['user_id'];
                    header("Location: index.php");
                    die;
                }
            }
        }
        
        $error_message = "Wrong username or password!";
    }else
    {
        $error_message = "Please enter valid information!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css"> <!-- Assuming you have a shared CSS file -->
</head>
<body>
    <style type="text/css">
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        #box {
            background-color: #fff;
            width: 400px;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        #box div {
            font-size: 24px;
            margin-bottom: 20px;
            color: #333;
        }

        #text {
            height: 40px;
            border-radius: 5px;
            padding: 10px;
            border: 1px solid #ccc;
            width: 100%;
            margin-bottom: 20px;
            font-size: 16px;
        }

        #button {
            padding: 10px;
            width: 100%;
            color: white;
            background-color: #7E5CD9; /* Matches your theme color */
            border: none;
            border-radius: 5px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        #button:hover {
            background-color: #5A3D99; /* Darker shade for hover effect */
        }

        #box a {
            color: #7E5CD9;
            text-decoration: none;
            display: block;
            margin-top: 20px;
            font-size: 14px;
        }

        #box a:hover {
            text-decoration: underline;
        }

        .error-message {
            color: #ff4d4d;
            background-color: #ffe6e6;
            border: 1px solid #ff4d4d;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 20px;
            font-size: 14px;
        }
    </style>
    <link rel="icon" type="image/png" href="img/electrance-image.png">
    <div id="box">
        <form method="post">
            <div>Login</div>

            <?php if(!empty($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>

            <input id="text" type="text" name="user_name" placeholder="Username"><br><br>
            <input id="text" type="password" name="password" placeholder="Password"><br><br>
            <input id="button" type="submit" value="Login"><br><br>
            <a href="signup.php">Click to Signup</a><br><br>
        </form>
    </div>
</body>
</html>
