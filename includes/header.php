<?php 

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

    <nav>

        <ul class="left">

            <li>



                <p2 style="padding: 18px;">Discover Morgantown</p2>



            </li>

        </ul>

        <ul style="margin-top: -75px;">

            <?php if (isset($_SESSION['uid'])) {

                        echo '

                        <li>

                        <a href="../home.php">

                        <p style="padding: 18px;">Home</p>

                        </a>

                        </li>

                        <li>

                        <a href="../activities.php">

                        <p style="padding: 18px;">Activities</p>

                        </a>

                        </li>

                        <li>

                        <a href="../about.php">

                        <p style="padding: 18px;">About</p>

                        </a>

                        </li>

                        ';

                    }

                    else {

                        echo '

                        <li>

                    <a href="../home.php">

                            <p style="padding: 18px;">Home</p>

                        </a>

                    </li>

                    <li>

                        <a href="../login.php">

                        <p style="padding: 18px;">Login</p>

                        </a>

                    </li>

                    <li>

                    <a href="../signup.php">

                    <p style="padding: 18px;">Signup</p>

                    </a>

                    </li>

                    <li>

                    <a href="../about.php">

                            <p style="padding: 18px;">About</p>

                        </a>

                    </li>

                    ';

                    }

                    ?>

        </ul>

        <ul class="right" style="margin-top: -75px;">

        <?php if (isset($_SESSION['uid'])) {

                        echo '

                        <li>

                    <a href="includes/logout.php">

                    <p style="padding: 18px;">Signout</p>

                    </a>

                    </li>

                        <li>

                <a class="profile circle" style="margin-left: 25px; margin-top: 8px; background-image: url(../images/login-background.png);" href="../profile.php">

                </a>

            </li>';

                    }

                    else {

                        echo '

                        <li>

                <a class="profile circle" style="margin-top: 8px; background-image: url(../images/default.png);" href="../login.php">

                </a>

            </li>

                    ';

                    }

                    ?>

        </ul>

    </nav>

</header>
