<!DOCTYPE html>
<html lang="en">
    
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--Import library for the arrow symbol-->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">

    
    <link rel="stylesheet" href="assets/css/homepage.css">

   
    <title>FitnessZone</title>
</head>

<body>
    <!--Header/Banner of the Homepage-->
    <header class="header" id="header">

        <nav class="nav container">

            <!--Arnold Mini logo and Fitnesszone Title-->
            <div class="nav__logo">
                <img src="assets/img/logo.png" alt="logo">FitnessZone
            </div>

            <!--The contents of the header/banner including Kosovo, Prishtina, Phone Number, @FitnessZone and the Log In Button-->
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
                    <div class="nav__link">
                        <?php 
                            session_start();
                            $isLoggedIn = isset($_SESSION['username']);
                        ?>
                        <!-- check if the user is logged in and change the login button to direct to services -->
                        <?php if($isLoggedIn) : ?>
                            
                            <a href="services.php" class="button nav__button"> 
                                Services
                            </a>
                        <?php else : ?>
                            <!-- Link to logout.php for log in functionality -->
                            <a href="login.php" class="button nav__button"> 
                                Log in
                            </a>
                        <?php endif; ?>
                    </div>
                </ul>
        </nav>
    </header>

        <!--Main Content of Homepage-->

        <section class="home section" id="home">
            <div class="home__container container grid">
                <div class="home__data">

                    <!--HomePage Main Title, Description and Register Button-->
                    <h2 class="home__main_title_1">CREATE YOUR</h2>
                    <h1 class="home__main_title_2">PERFECT BODY</h1>
                    <p class="home__description">
                        At FitnessZone, we are dedicated to helping you achieve your fitness goals and live a healthier, happier life. Our state-of-the-art facilities, experienced trainers, and wide range of classes and programs cater to fitness enthusiasts of all levels.
                    </p>
                    <!-- Link that redirects the user to the register webpage-->

                    <a href="register.php" class="button button__flex"> 
                        <!-- Link to register.php for registration functionality -->
                        SIGN UP <i class="ri-arrow-right-line"></i>
                    </a>
                </div>

                <!-- The Arnold Photo and the red triangle shapes background-->
                <div class="home__images">
                    <img src="assets/img/arnold.png" alt="home image" class="home__img">
                    <div class="home__triangle home__triangle-3"></div>
                    <div class="home__triangle home__triangle-2"></div>
                    <div class="home__triangle home__triangle-1"></div>
                </div>
            </div>
        </section>
       
</body>
</html>

