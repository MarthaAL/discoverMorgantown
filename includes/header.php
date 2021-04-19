<?php 
require 'includes/dbhandler.php';
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

    <script src="https://kit.fontawesome.com/0809ee8fa6.js" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

                        echo '
                        <li><a href="../home.php"><p style="padding: 18px;">Home</p></a></li>
                        <li><a href="../activities.php"><p style="padding: 18px;">Activities</p></a></li>
                        <li><a href="../index.php"><p style="padding: 18px;">AboutUs</p></a></li>
                        <li><a href="../about.php"><p style="padding: 18px;">About</p></a></li>';
                    }

                    else {

                        echo '
                        <li><a href="../home.php"><p style="padding: 18px;">Home</p></a></li>
                        <li><a href="../login.php"><p style="padding: 18px;">Login</p></a></li>
                        <li><a href="../signup.php"><p style="padding: 18px;">Signup</p></a></li>
                        <li><a href="../index.php"><p style="padding: 18px;">AboutUs</p></a></li>
                        <li><a href="../about.php"><p style="padding: 18px;">About</p></a></li>';
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
                        <li><a class="dropdown-item" href="../favorties.php">Favorites</a></li>
                        <li><a class="dropdown-item" href="../logout.php">Signout</a></li>
                        </div>
                        </div>';
                    }

                    else {

                        echo '
                        <div class="dropdown circle" style="margin-left: 0px; margin-top: 8px;">
                        <img class="profile circle" src="../images/default.png";>
                        <div class="dropdown-content" style="transform: translate(-76px, 0px);">
                        <a style="background-color: rgb(0, 40, 85); font-size: 0px; padding: 4px;"></a>
                        <li><a class="dropdown-item" href="../login.php">Login</a></li>
                        <li><a class="dropdown-item" href="../signup.php">Signup</a></li>
                        </div>
                        </div>';
                    }
                    ?>
        </ul>
    </div>
</header>
