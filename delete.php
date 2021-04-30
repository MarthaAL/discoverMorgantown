<?php
    require 'includes/dbhandler.php';

    $id=$_REQUEST['sid'];
    $query = "DELETE FROM suggestions WHERE id=$id;"; 
    $result = mysqli_query($conn,$query) or die ( mysqli_error());
    header("Location: review-suggestions.php");
?>