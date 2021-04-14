<?php
// make sure the database can be accessed and start session
require 'dbhandler.php';
session_start();

// if the 'Submit Suggestion' was clicked
if(isset($_POST['suggestion-submit']))
{
    $name = $_POST['name']; // name of the activity/location
    $address = $_POST['location']; // the address the activity takes place
    $descript = $_POST['description']; // A short description of the activity
    $tags = $_POST['tags'];

    // Prepare SQL statement and connect to database
    $sql = "INSERT INTO suggestions (name, location, description, tags) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    // Check for SQL Injection
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../suggestions.php?error=SQLInjection");
        exit();
    } else {
        // Bind the SQL statement, execute it, and store the result
        mysqli_stmt_bind_param($stmt, "ssss", $name, $address, $descript, $tags);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);

        // Success message display
        header("Location: ../suggestions.php?sucess=SuggestionUploaded");
        exit();
    }
}   
// If the button was not clicked
else
{
    header("Location: ../suggestions.php");
    exit();
}