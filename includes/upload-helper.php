<?php
//If the user clicks the buton on the profile page, checks that the new profile picture did not have an upload error,
//has a valid file type and size, and then uploads the picture with a unique id as the name to the profiles folder and 
//updates the database.

    require 'dbhandler.php';
    session_start();

    //Maximum size of profile pictures that can be uploaded
    define('KB', 1024);
    define('MB', 1048576);

    //Checks that the user clicked the button to upload and save a new profile picture
    if (isset($_POST['prof-submit']))
     {
        //Get profile picture information
        $uname = $_SESSION['uname'];
        $file = $_FILES['prof-image'];
        $file_name = $file['name'];
        $file_tmp_name = $file['tmp_name'];
        $file_error = $file['error'];
        $file_size = $file['size'];

        $ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));

        $allowed = array('jpg', 'jpeg', 'png', 'svg');

        //Checks for upload error
        if ($file_error !== 0) 
        {
            header("Location: ../profile.php?error=UploadError");
            exit();
        }

        //Checks for allowed extension type
        if (!in_array($ext, $allowed)) 
        {
            header("Location: ../profile.php?error=InvalidType");
            exit();
        }

        //Checks for allowed file size
        if ($file_size > 4*MB) 
        {
            header("Location: ../profile.php?error=FileSizeExceeded");
            exit();
        }
        else 
        {
            //Create a unique id as the name for the profile picture
            $new_name = uniqid('',true).".".$ext;

            //Add the profile picture to the profiles folder and update the database
            $destination = 'profiles/'.$new_name;

            $sql = "UPDATE profiles SET profpic='$destination' WHERE uname='$uname'";

            mysqli_query($conn, $sql);

            move_uploaded_file($file_tmp_name, '../'.$destination);
            header("Location: ../profile.php?success=UploadWin");
            exit();
        }

    }
    else
    {
        header("Location: ../profile.php");
        exit();
    }