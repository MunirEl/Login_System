<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style2.css">
    <title>Login_System</title>
</head>
<body>
    <nav>
        <label class="logo">Logo</label> 
        <!--<a href="#">JavaScript</a>--> 
        <ul>
            <li><a class="active" href="index.php">Home</a></li>
            <li><a href="#">About</a></li>
            <?php
                if (isset($_SESSION['name'])) 
                {
                    echo "<li><a href='#'>".$_SESSION['name']."</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Logout</a></li>";
                }else
                {
                    echo '<li><a href="login.php">Login</a></li>';
                    echo '<li><a href="signup.php">SignUp</a></li>';
                }
            ?>
        </ul>
    </nav>
    <br>
    <br>
    <br>
    