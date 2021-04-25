<?php
//If the user clicks the favorite button, adds the activity to the users favorited activities and updates the database.
//If the user clicks the unfavorite button, removes the activity from the user's favorited activities and updates the database.

    require 'dbhandler.php';
    session_start();


    //Checks that the user clicked the button to favorite an activity
    if (isset($_POST['Favorite']))
     {
        //Get activity and user information
        $activityid = $_SESSION['activity'];
        $userid = $_SESSION['uid'];

        //Add activity to user's favorite activities
        $sql = "INSERT INTO favorites (userid, activityid) VALUES ('$userid', '$activityid') ";

        mysqli_query($conn, $sql);

        header("Location: ../activitydisplay.php?success=FavoriteWin");
        exit();
    }
    //Checks that the user clicked the button to unfavorite an activity
    else if (isset($_POST['Unfavorite']))
     {
        //Get activity and user information
        $activityid = $_SESSION['activity'];
        $userid = $_SESSION['uid'];

        //Remove activity from user's favorite activities
        $sql = "DELETE FROM favorites WHERE activityid='$activityid' AND userid='$userid'";

        mysqli_query($conn, $sql);

        header("Location: ../activitydisplay.php?success=UnfavoriteWin");
        exit();
    }
    else
    {
        header("Location: ../activitydisplay.php");
        exit();
    }