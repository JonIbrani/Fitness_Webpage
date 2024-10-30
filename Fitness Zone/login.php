
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FitnessZone</title>
    <link rel="stylesheet" href="assets/css/login.css"> 
</head>
<body>
    <header class="header" id="header">
        <nav class="nav container">
        <div class="nav__logo">
            <!--header/banner -->
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
    <section class="Login section">
        <div class="container">
            <!-- Login form -->
            <h2 class="Login__title">Login</h2>
            <div class="Login__input">
                <form action="login.php" method="post" class="Login__form">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" ><br><br>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" ><br><br>
                    <input type="submit" value="Login">
                    <div class="Register__input" id="lb">
                        <button formaction="register.php" class="button">Dont have an account yet? Register now</button>
                    </div>
                </form>
            
        </div>
    </section>

    <?php
session_start();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    $link = mysqli_connect("localhost", "root", "", "fz");

    if ($link === false) {
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }

    // Query to check user credentials
    $query = "SELECT * FROM users WHERE UserName = '$username' AND Pass = '$password'";
    $result = mysqli_query($link, $query);
    
    // Check if the query was successful
    if ($result) {
        // Check if a matching user was found, if so, redirect to services
        if (mysqli_num_rows($result) == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header("Location: services.php");
            exit();
        } else {
            echo "Invalid username or password.";
        }
    } else {
        echo "ERROR: Could not execute $query. " . mysqli_error($link);
    }
    
    mysqli_close($link);
}
?>
 
</body>
</html>