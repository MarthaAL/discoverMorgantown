<?php

    require_once 'dbhandler.php';

    define('KB', 1024);
    define('MB', 1048576);

    if (isset($_POST['activity-submit']))
     {
        session_start();
        
        $name = $_POST['actname'];
        $location = $_POST['actlocation'];
        $description = $_POST["actdescription"];
        $open = $_POST['open'];
        $close = $_POST['close'];
        $cost = $_POST['cost'];
        $tags = $_POST['acttags'];
        $fakes = $_POST['fakes'];
        
        $file1 = $_FILES['pic1'];
        $file2 = $_FILES['pic2'];

        $file_name1 = $file1['name'];
        $file_tmp_name1 = $file1['tmp_name'];
        $file_error1 = $file1['error'];
        $file_size1 = $file1['size'];

        $file_name2 = $file2['name'];
        $file_tmp_name2 = $file2['tmp_name'];
        $file_error2 = $file2['error'];
        $file_size2 = $file2['size'];

        $ext1 = strtolower(pathinfo($file_name1, PATHINFO_EXTENSION));
        $ext2 = strtolower(pathinfo($file_name2, PATHINFO_EXTENSION));

        $allowed = array('jpg', 'jpeg', 'png', 'svg');

        if ($file_error1 !== 0) 
        {
            header("Location: ../insert.php?error=UploadError");
            exit();
        }

        if (!in_array($ext1, $allowed) || !in_array($ext2, $allowed)) 
        {
            header("Location: ../insert.php?error=InvalidType");
            exit();
        }

        if ($file_size1 > 4*MB || $file_size2 > 4*MB) 
        {
            header("Location: ../insert.php?error=FileSizeExceeded");
            exit();
        }
        else 
        {
            $new_name1 = uniqid('',true).".".$ext1;
            $new_name2 = uniqid('',true).".".$ext2;

            $destination1 = 'activity-images/'.$new_name1;
            $destination2 = 'activity-images/'.$new_name2;

            $ins_query="INSERT INTO activities ([name], [description], [location], [open], [close], cost, pic1, pic2, tags, fakes) VALUES ('$name', '$description', '$location', '$open', '$close', '$cost', '$destination1', '$destination2', '$tags', '$fakes');";

            mysqli_query($conn, $ins_query);

            move_uploaded_file($file_tmp_name1, '../'.$destination1);
            move_uploaded_file($file_tmp_name2, '../'.$destination2);
            header("Location: ../delete.php");
            exit();
        }

    }
    else
    {
        header("Location: ../insert.php");
        exit();
    }