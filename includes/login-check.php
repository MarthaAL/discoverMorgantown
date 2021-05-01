<?php

    function isLoggedIn() {
        if(!isset($_SESSION['uid'])){
            header("Location: ../pageerror.php");
            exit();
        }
    }

    function isAdmin(){
            if(isset($_SESSION['uid']))
            {
                //Get admin status
                $uname = $_SESSION['uname'];
                $sqlpro = "SELECT * FROM users WHERE uname='$uname';";
                $res = mysqli_query($conn, $sqlpro);
                $row = mysqli_fetch_array($res);
                $admin = $row['admin'];

            if($admin == 1){
                return true;
            }
        }
    }
?>
