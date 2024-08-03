<?php
// Start the session

// echo $_SESSION["username"];
// Check if the user is logged in
// if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
//     // Display the username
//     if (isset($_SESSION['username'])) {
//         $username = $_SESSION['username'];
//         echo "Welcome, $username!";
//     } else {
//         echo "Welcome!";
//     }
// } 
// else {
//     // Redirect to the login page if the user is not logged in
//     // header("Location:index.php");
//     exit();
// }


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Learn</title>
    <!-- CSS -->
    <link rel="stylesheet" href="CSS/Nav.css">
    <link rel="stylesheet" href="CSS/swiper-bundle.min.css">
    <link rel="stylesheet" href="CSS/style.css">
    <!-- <link rel="stylesheet" href="CSS/Navbar.css"> -->
    <link rel="stylesheet" href="CSS/homeSlider.css">
    <link rel="stylesheet" href="CSS/HomeSearchBar.css">
    <link rel="stylesheet" href="CSS/CourseCard.css">
    <link rel="stylesheet" href="CSS/ShowCourse.css">
    <!-- <link rel="stylesheet" href="CSS/welcome.css"> -->
    <!-- <link rel="stylesheet" href="CSS/signup.css"> -->
    <script src="js/homeSlider"></script>

    <!-- Add this in the head section of your HTML file -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <script src="https://kit.fontawesome.com/66aa7c98b3.js" crossorigin="anonymous"></script>
    <style>

    </style>

</head>

<body>

    <?php
    // echo $_SESSION['username'];
    ?>
    <?php include 'Partial/header.php' ?>
    <?php include 'Partial/signUp.php' ?>
    <?php include 'Partial/logIn.php' ?>





    <div class="welcome">
        <h1>Welcome to my website </h1>

        <div class="search-container">
    <input type="text" class="search-bar" placeholder="Search...">
    <button class="search-icon">&#128269;</button>
</div>

        <?php
        include 'CourseCard.php';
        ?>
    </div>

    <!-- Main Container -->

    <center>
        <h1 class="CourseRecommed">Programming Languages</h1>
    </center>

    <?php
    include 'Languages.php';
    ?>

    <center>
        <h1 class="CourseRecommed">Mobile App Development Course</h1>
    </center>

    <?php
    include 'AppDevelopment.php';
    ?>

    <center>
        <h1 class="CourseRecommed">Website Development Course</h1>
    </center>

    <?php
       include 'WebDevelopment.php';
    ?>

    <!-- Add this script at the end of your body or in a separate script file -->

    <script src="js/ShowCourse.js"></script>



    <!-- JavaScript -->
    <script src="js/script.js"></script>
    <script src="js/signup.js"></script>
    <script src="js/logIn.js"></script>
    <!-- Footer  -->

    <?php include 'partial/footer.php' ?>
</body>

</html>