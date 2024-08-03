<?php

include 'dbconnect.php';
session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
  }
  else{
    $loggedin = false;
  }



    // If logged in, show profile photo and logout button
   
    echo '<nav>
        <div class="logo"><img src="Img/MSPLogo.png" alt="" height="40px"></div>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="courses.php">Courses</a></li>
            <li><a href="tutorial.php">Tutorials</a></li>
            <li><a href="#">Practice</a></li>
            <li><a href="#">Interview Preparation</a></li>
            <li><a href="#">Articles</a></li>
            <li><a href="#">Forum</a></li>
            <li><a href="uploadData.php">Admin</a></li>

            ';
            if($loggedin){
                echo '
            <li><img src="partial/UserIcon.png" alt="Profile Photo" height="0px" style="border-radius: 50%; cursor: pointer;" onclick="openProfileModal()">'. $_SESSION['username'].'</li>';
          echo'  <li><button class="Sign"><a href="partial/logout.php">Log Out</a></button></li>';}
    
    
    // If not logged in, show Sign Up and Log In buttons
    
            if(!$loggedin){
                
            echo '

            <li><button class="Sign" id="signInButton">Sign Up</button></li>
            <li><button class="logIn" id="loginButton" onclick="openLoginModal()">Log In</button></li>';}
            echo'
            <div class="search">
                <input type="text" placeholder="Search Something">
                <span> Search </span>
            </div>
        </ul>
    </nav>';



?>