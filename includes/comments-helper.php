<?php 
require_once 'dbhandler.php';
date_default_timezone_set('UTC');
require_once 'dbhandler.php';
// Checks to see if the user is signed in
//Reloads same page without adding comment if not signed in
if(isset($_POST['comments-submit'])){
    session_start();
    $uname = $_SESSION['uname'];
    $item_id = $_POST['itemid'];
    if($uname == null){
        header("Location: ../activitydisplay.php?id=$item_id");
    }
    //If user is signed in the comment is then added with username, message, profilepic, and time/date of post
    else{
        $profpic = "SELECT profpic FROM profiles WHERE uname='$uname';";
        $res = mysqli_query($conn, $profpic);
        $picpath = mysqli_fetch_assoc($res);
        $pic = $picpath['profpic'];
        $date = date('Y-m-d H:i:s');
        
        $comments = $_POST['comments'];

        $sql = "INSERT INTO comments (comments, profpic, profname, itemid, posted) VALUES ('$comments', '$pic', '$uname', '$item_id', '$date' );";
        mysqli_query($conn, $sql);
    
       
        header("Location: ../activitydisplay.php?id=$item_id");
    }
}
?>