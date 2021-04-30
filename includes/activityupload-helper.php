<?php

    require 'dbhandler.php';
    session_start();

    define('KB', 1024);
    define('MB', 1048576);

    if (isset($_POST['activity-submit']))
     {
        $name = $_REQUEST['actname'];
        $location = $_REQUEST['actlocation'];
        $description = $_REQUEST["actdescription"];
        $open = $_REQUEST['open'];
        $close = $_REQUEST['close'];
        $tags = $_REQUEST['acttags'];
        $fakes = $_REQUEST['fakes'];
        
        $file1 = $_FILES['act-image1'];
        $file2 = $_FILES['act-image2'];

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

        if ($file_error1 !== 0 && $file_error2 !== 0) 
        {
            header("Location: ../insert.php?error=UploadError");
            exit();
        }

        if (!in_array($ext1, $allowed) && !in_array($ext2, $allowed)) 
        {
            header("Location: ../insert.php?error=InvalidType");
            exit();
        }

        if ($file_size1 > 4*MB && $file_size2 > 4*MB) 
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

            $ins_query="INSERT INTO activities (`name`,`location`,`description`, `open`, `close`, `tags`, `fakes`, `pic1`, `pic2`) VALUES ('$name','$location','$description','$open', '$close', '$tags', '$fakes', '$destination1', $destination2');";

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