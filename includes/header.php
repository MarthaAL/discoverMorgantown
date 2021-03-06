<?php 
require 'includes/dbhandler.php';
require 'includes/login-check.php';
session_start();

?>



<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title></title>

    <meta name="description" content="">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../css/header.css">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">

    </script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">

    </script>


</head>


<header>
    <div>
    <nav>
        <ul class="left">
            <li>
                <p2 style="padding: 18px;">Discover Morgantown</p2>
            </li>
        </ul>
        <ul style="margin-top: -75px;">
            <?php if (isset($_SESSION['uid'])) {
                //Get admin status
                $uname = $_SESSION['uname'];
                $sqlpro = "SELECT * FROM users WHERE uname='$uname';";
                $res = mysqli_query($conn, $sqlpro);
                $row = mysqli_fetch_array($res);
                $admin = $row['admin'];
                
                    if($admin == 1){
                        echo '
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../activities.php"><p style="padding: 18px; font-size: 25px;">Activities</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../map.php"><p style="padding: 18px;  font-size: 25px;">Map</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../review-suggestions.php"><p style="padding: 18px;  font-size: 25px;">Review Suggestions</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../index.php"><p style="padding: 18px;  font-size: 25px;">About Us</p></a></li>';
                    }
                    else{
                        echo '
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../activities.php"><p style="padding: 18px;  font-size: 25px;">Activities</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../map.php"><p style="padding: 18px;  font-size: 25px;">Map</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../suggestions.php"><p style="padding: 18px;  font-size: 25px;">Suggestions</p></a></li>
                        <li style="padding-left: 0px; padding-right: 0px;"><a href="../index.php"><p style="padding: 18px;  font-size: 25px;">About Us</p></a></li>';
                    }
                    
                }

                else {
                    echo '
                    <li style="padding-left: 0px; padding-right: 0px;"><a href="../login.php"><p style="padding: 18px;">Log In</p></a></li>
                    <li style="padding-left: 0px; padding-right: 0px;"><a href="../signup.php"><p style="padding: 18px;">Sign Up</p></a></li>
                    <li style="padding-left: 0px; padding-right: 0px;"><a href="../index.php"><p style="padding: 18px;">About Us</p></a></li>';
                }
            ?>        
        </ul>
        </nav>
        <ul class="right" style="margin-left: -100px; padding-left: 0px; margin-top: -75px;">
            <?php if (isset($_SESSION['uid'])) {

                    $prof_user = $_SESSION['uname'];
                    $sqlpro = "SELECT * FROM profiles WHERE uname='$prof_user';";
                    $res = mysqli_query($conn, $sqlpro);
                    $row = mysqli_fetch_array($res);
                    $photo = $row['profpic']; //path to the profile picture
                    
                        echo '
                        <div class="dropdown circle" style="margin-left: 0px; margin-top: 8px;">
                        <img class="profile circle" src="'.$photo.'";>
                        <div class="dropdown-content" style="transform: translate(-76px, 0px);">
                        <a style="background-color: rgb(0, 40, 85); font-size: 0px; padding: 4px;"></a>
                        <li><a class="dropdown-item" href="../profile.php">Profile</a></li>
                        <li><a class="dropdown-item" href="../favorites.php">Favorites</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Sign Out</a></li>
                        </div>
                        </div>';
                    }

                    else {

                        echo '
                        <div class="dropdown circle" style="margin-left: 0px; margin-top: 8px;">
                        <img class="profile circle" src="../images/default.png";>
                        <div class="dropdown-content" style="transform: translate(-76px, 0px);">
                        <a style="background-color: rgb(0, 40, 85); font-size: 0px; padding: 4px;"></a>
                        <li><a class="dropdown-item" href="../login.php">Log In</a></li>
                        <li><a class="dropdown-item" href="../signup.php">Sign Up</a></li>
                        </div>
                        </div>';
                    }
                    ?>
        </ul>
    </div>
</header>
