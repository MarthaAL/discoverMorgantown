<?php
    require 'includes/dbhandler.php';

    $id=$_GET['id'];
    $query = "DELETE FROM suggestions WHERE sid='$id';"; 
    $result = mysqli_query($conn,$query) or die ( mysqli_error());
    header("Location: review-suggestions.php");
?>