<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - FitnessZone</title>
    <link rel="stylesheet" href="assets/css/services.css"> 
    <!-- Include library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"> 
    <style>
        /* Internal CSS styles for certain specifiic elements */
        header {
            text-align: center;
            padding: 20px 0;
        }
        main {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            padding: 20px;
        }
        .user-info {
            text-align: center;
            font-size: 16px;
            color: #d32f2f; /* Red color for text */
            background-color: black; /* Dark background color */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 250px; /* Fixed width for each user info card */
        }
        .user-info i {
            font-size: 48px;
            margin-bottom: 10px;
        }
        footer {
            text-align: center;
            padding: 20px 0;
        }
        form {
            text-align: center;
            margin-top: 20px;
        }
        label {
            font-weight: bold;
            color: #d32f2f; /* Red color for labels */
        }
        select {
            padding: 10px;
            border: 1px solid #666; /* Dark gray border */
            border-radius: 4px;
            background-color: black; /* Dark background color for dropdown */
            color: #fff; /* White text color */
            font-size: 16px;
        }
        input[type="submit"] {
            background-color: #d32f2f; /* Red background color */
            color: #fff; /* White text color */
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        input[type="submit"]:hover {
            background-color: #b71c1c; /* Darker red color on hover */
        }
    </style>
</head>

<body>
    <header class="header" id="header">
        <!-- Header section with logo and navigation -->
        <nav class="nav container">
            <div class="nav__logo">
                <a href="index.php"> 
                    <img src="assets/img/logo.png" alt="logo"> 
                </a>
                FitnessZone
            </div>

            <ul class="nav__list">
                 <!--The contents of the header/banner shared among all pages-->
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
                <div class="nav__link">
                    <!-- Link to logout.php for log out functionality -->
                    <a href="logout.php" class="button nav__button"> 
                        Log Out
                    </a>
                </div>
            </ul>
        </nav>

        <main>
            <?php
            session_start();
 
            // Connecting to MySQL database
            $link = mysqli_connect("localhost", "root", "", "fz"); 

            // Check connection
            if ($link === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // If form submitted via POST method, update user's payment plan
                $newPaymentPlan = $_POST['payment_plan'];
                $password = $_SESSION['password']; 

                // Update payment plan, DateOfRegistration, and ExpirationDate
                $currentDate = date('Y-m-d');
                $expirationDate = date('Y-m-d', strtotime('+1 year', strtotime($currentDate)));

                $updateSql = "UPDATE users SET PaymentPlan = '$newPaymentPlan', DateOfRegistration = '$currentDate', Expiration = '$expirationDate' WHERE Pass = '$password'";
                if (mysqli_query($link, $updateSql)) {
                    echo ""; 
                } else {
                    echo "ERROR: Could not able to execute $updateSql. " . mysqli_error($link); 
                }
            }

            // Fetch user details for display
            error_log(print_r($_SESSION, TRUE));
            $password = $_SESSION['password'];
            $sql = "SELECT * FROM users WHERE Pass = '$password'"; 
            
            $result = mysqli_query($link, $sql);

            if ($result) {
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        // Display user information under icons
                        ?>
                        <div class="user-info">
                            <i class="fas fa-user"></i>
                            <p>Name: <?php echo $row['Fname'] . ' ' . $row['Lname']; ?></p>
                        </div>
                        <div class="user-info">
                            <i class="fas fa-phone"></i>
                            <p>Phone: <?php echo $row['Num']; ?></p>
                        </div>
                        <div class="user-info">
                            <i class="fas fa-envelope"></i>
                            <p>Email: <?php echo $row['email']; ?></p>
                        </div>
                        <div class="user-info">
                            <i class="fas fa-gem"></i>
                            <p>Membership: <?php echo $row['PaymentPlan']; ?></p>
                        </div>
                        <div class="user-info">
                            <i class="fas fa-calendar-check"></i>
                            <p>Expiration Date: <?php echo $row['Expiration']; ?></p>
                        </div>
                        <?php
                    }
                } else {
                    echo "No records matching your query were found."; 
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); 
            }

           
            mysqli_close($link); 
            ?>
        </main>

        <footer>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <!-- Membership plan update form -->
                <label for="payment_plan">Change Membership:</label>
                <select name="payment_plan" id="payment_plan">
                    <!-- Membership plan options -->
                    <option value="Gym">Gym</option>
                    <option value="Spa">Spa</option>
                    <option value="Gym & Spa">Gym & Spa</option>
                </select>
                <input type="submit" value="Update Membership"> 
            </form>
        </footer>
    </header>
</body>

</html>