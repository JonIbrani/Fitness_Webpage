<!DOCTYPE html>
<!-- This is an HTML document for managing user memberships and displaying user information on a fitness center website. -->
<html lang="en">
<head>
    <!-- Meta tags for character encoding and responsive viewport -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title of the webpage -->
    <title>Services - FitnessZone</title>
    <!-- Linking external CSS for general styles -->
    <link rel="stylesheet" href="assets/css/services.css">
    <!-- Linking FontAwesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Internal CSS styles for specific elements */
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
    <!-- Header section with logo and navigation -->
    <header class="header" id="header">
        <nav class="nav container">
            <!-- Logo and website title -->
            <div class="nav__logo">
                <a href="index.php">
                    <img src="assets/img/logo.png" alt="logo">
                </a>
                FitnessZone
            </div>

            <!-- Navigation links -->
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
                <!-- Logout button -->
                <div class="nav__link">
                    <a href="logout.php" class="button nav__button">
                        Log Out
                    </a>
                </div>
            </ul>
        </nav>

        <main>
            <?php
            session_start(); // Starting session
 
            // Establishing MySQL server connection
            $link = mysqli_connect("localhost", "root", "", "fz");

            // Checking database connection
            if ($link === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Processing form submission to update user's payment plan
                $newPaymentPlan = $_POST['payment_plan'];
                $password = $_SESSION['password']; // Example user ID, change this based on your logic

                // Updating payment plan, DateOfRegistration, and ExpirationDate
                $currentDate = date('Y-m-d');
                $expirationDate = date('Y-m-d', strtotime('+1 year', strtotime($currentDate)));

                $updateSql = "UPDATE users SET PaymentPlan = '$newPaymentPlan', DateOfRegistration = '$currentDate', Expiration = '$expirationDate' WHERE Pass = '$password'";
                if (mysqli_query($link, $updateSql)) {
                    echo ""; // Successfully updated
                } else {
                    echo "ERROR: Could not able to execute $updateSql. " . mysqli_error($link); // Display error message
                }
            }

            // Fetching user details for display
            error_log(print_r($_SESSION, TRUE));
            $password = $_SESSION['password'];
            $sql = "SELECT * FROM users WHERE Pass = '$password'"; // Assuming 'id' is the primary key column in your users table
            
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
                    echo "No records matching your query were found."; // Display message if no user found
                }
            } else {
                echo "ERROR: Could not able to execute $sql. " . mysqli_error($link); // Display error if SQL query fails
            }

            // Closing database connection
            mysqli_close($link);
            ?>
        </main>

        <footer>
            <!-- Membership plan update form -->
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="payment_plan">Change Membership:</label>
                <!-- Membership plan options -->
                <select name="payment_plan" id="payment_plan">
                    <option value="Gym">Gym</option>
                    <option value="Spa">Spa</option>
                    <option value="Gym & Spa">Gym & Spa</option>
                </select>
                <input type="submit" value="Update Membership"> <!-- Submission button -->
            </form>
        </footer>
    </header>
</body>

</html>
