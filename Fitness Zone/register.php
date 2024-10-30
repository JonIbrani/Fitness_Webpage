<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - FitnessZone</title>
    <link rel="stylesheet" href="assets/css/register.css"> 
</head>
<body>
    <!-- The contents of the header/banner as found in the other pages-->
    <header class="header" id="header">
        <nav class="nav container">
        <div class="nav__logo">
                <a href="index.php"> 
                    <img src="assets/img/logo.png" alt="logo"> 
                </a>
                FitnessZone
            </div>
            <ul class="nav__list">
                <li class="nav__item">
                    <div class="nav__link">Kosovo</div>
                </li>
                <li class="nav__item">
                    <div class="nav__link">Prishtina</div>
                </li>
                <li class="nav__item">
                    <div class="nav__link">+383 45 332 123</div>
                </li>
                <li class="nav__item">
                    <div class="nav__link">@FitnessZone</div>
                </li>
            </ul>
        </nav>
    </header>
    <!-- Form for registering a new user -->
    <section class="register section">
        <div class="container">
            <h2 class="register__title">Register</h2>
            <form action="register.php" method="post" class="register__form">
                <div class="register__input">
                    <input type="text" name="first_name" placeholder="First Name" required>
                </div>
                <div class="register__input">
                    <input type="text" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="register__input">
                    <input type="text" name="phone_number" placeholder="Phone Number" required>
                </div>
                <div class="register__input">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="register__input">
                    <input type="text" name="username" placeholder="Username" required>
                </div>
                <div class="register__input">
                    <input type="password" name="password" placeholder="Password" required>
                </div>
                <div class="register__input">
                    <button type="submit" class="button">Register</button>
                </div>
                
            </form>
        </div>
    </section>

<?php
    if(isset($_POST['first_name'], $_POST['last_name'], $_POST['phone_number'], $_POST['email'], $_POST['username'], $_POST['password'])) {
        // Database credentials
        $hostname = "localhost"; 
        $username = "root"; //  MySQL username
        $password = ""; 
        $database = "fz"; //  MySQL database name

        // connecting to database
        $link = mysqli_connect($hostname, $username, $password, $database);

        // Check connection
        if($link === false){
            die("ERROR: Could not connect. " . mysqli_connect_error());
        }

        // Retrieve form data
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $phone_number = $_POST['phone_number'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $nick = $_POST['username'];
        $current_date = date("Y-m-d H:i:s");

        // SQL query to insert data into database
        $sql = "INSERT INTO users (Fname, Lname, Num, email, pass, UserName, DateOfRegistration) VALUES ('$first_name', '$last_name', '$phone_number', '$email', '$password', '$nick', '$current_date')";

        if(mysqli_query($link, $sql)){
            
        } else{
            echo "ERROR: Could not execute $sql. " . mysqli_error($link);
        }

        mysqli_close($link);

        session_start(); 

        $_SESSION['username'] = $nick;
        $_SESSION['password'] = $password;

        header("Location: services.php");
    }
?>





</body>
</html>