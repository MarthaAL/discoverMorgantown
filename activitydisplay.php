<?php
require 'includes/header.php';
isLoggedIn();

// Pulls all variables needed from the activities table
    include_once 'includes/dbhandler.php';
    $activityid = $_GET['id'];
    $_SESSION['activity'] = $activityid;
    $sql = "SELECT * FROM activities WHERE itemid= $activityid";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $name = $row['name'];
    $descript = $row['description'];
    $open = $row['open'];
    $close = $row['close'];
    $location = $row['location'];
    $cost = $row['cost'];
    $tags = str_replace(',', ' ', $row['tags']);
    $pic1 = $row['pic1'];
    $pic2 = $row['pic2'];
    $fakes = $row['fakes'];
    ?>


<!DOCTYPE html>
<html lang="en" class="no-js">
<head>
	<title>Activity Display Page</title>
	<link rel="stylesheet" href="/css/activitydisplay.css">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
</head>

<main>
<body class="w3-light-grey">
<!-- Defines White space margins on side -->
<div class="w3-content" style="max-width:1500px">


<!-- Starts building a Grid -->
<div class="w3-row">

<!-- Groups all info cards together under Grid -->
<div class="w3-rest">
  <!-- Creates Top Activity Card -->
  <div class=" w3-card-4 w3-margin">
  
    <!-- Title -->
    <div class="w3-container w3-center">
      <h0> <?php echo $name ?> </h0>
      <br>
      <!-- Displays time in AM/PM format -->
      <hours>Hours: <?php echo date('h:i A', strtotime($open)) ?> - <?php echo date('h:i A', strtotime($close)) ?> <br> *Hours subject to change </hours>
    </div>

    <!-- Activity Images -->
    <div class="w3-container" >
      <img class = "img1" src= <?php echo $pic1 ?> alt = "Activity Image 1" >
      <img class = "img2" src= <?php echo $pic2 ?> alt = "Activity Image 2">
      
      
    </div>
 </div>
  <hr>
</div>

<!-- Further defines grid and creates card -->
<div class="w3-row">
    <div class="w3-col l8 s12">
        <div class="w3-card-4 w3-margin">
        
            <!-- Details Card for description -->
            <div class="w3-container">
                <h>Details:</h>
                <sh class="w3-opacity"> <br>Last Updated: May 5, 2021 </sh>
            </div>
        
            <div class="w3-container2">
                <p>  <?php echo $descript ?> 
                    <br>         </p>
         <!-- Checks to see if there is a cost value to display -->
                <p0> <?php  $costdisplay = 'Cost: ';
                            if($cost == 0){
                                    $cost = null;
                                    $costdisplay = null;
                                 }
                                 else{
                                     $cost = str_repeat('$', $cost);
                                 }
                                 echo $costdisplay;
                                    ?>  </p0>
               
               <p1> <?php echo $cost ?> <br></p1>
            <!-- Checks to see if their is a fakes value to display -->
                <p0> <?php  $fakesdisplay = 'Fakes: ';
                            if($fakes == 0){
                                    $fakes = null;
                                    $fakesdisplay = null;
                                 }
                                 else{
                                     $fakes = "¯\_(ツ)_/¯";
                                 }
                                 echo $fakesdisplay;
                                    ?>  </p0>

                <p1> <?php echo $fakes ?> </p1>

            </div>
        </div>
        <!-- Creates Comments Card -->
        <div class="w3-card-4 w3-margin">
        
            <div class="w3-container">
                <h>Comments</h>
            </div>
        
            <div class="w3-container2">
                        <!-- Shows comments from database in descending order-->
                         
                <?php
                    include_once 'includes/dbhandler.php';
                           
                    $sql = "SELECT * FROM comments WHERE itemid = $activityid ORDER BY posted DESC";
                    $query = mysqli_query($conn, $sql);
                    //Creates Comment Cards 
                    while($row = mysqli_fetch_assoc($query)){
                        echo '<div class = "w3-card-4"> 
                         <div class ="w3-container2">
                        <img class = "img3"  src= "'.$row['profpic'].'">
                        <pname>'.$row["profname"].'</pname>
                        <posted>'.$row["posted"].'</posted>
                        <br>
                        <comments>'.$row['comments'].'</comments>
                        </div>
                        </div>';
                     }
                ?>
                        
             <!-- Creates comment box-->
                <div class="container"  style="max-width: 800px;">
                    <div class="my-auto">

                    <form id="comments-form" action="includes/comments-helper.php" method="post">
                        <div class="form-group" style = "margin-top: 15px;">
                            <textarea name="comments" id="comments-text" cols="50" rows="3" placeholder="Enter a comment..."></textarea>
                            <input type="hidden" name="itemid" value="<?php echo $_GET['id'];?>">
                        </div>
                    
                        <div class="form-group" style = "margin-bottom: 10px;">
                        <!-- Creates comment button-->
                            <button class="btn btn-outline-danger" type="submit" name="comments-submit" id="comments-submit" style="width: 20%, height: 120%">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
                    
        </div>
    </div>
</div>
                


<!-- Creates Location Card -->
    <div class="w3-col l4">

        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
                <h>Location</h>
            </div>
            <div class="w3-container2">
                <p0>Location: </p0>
                <p> <?php echo $location ?> <br> </p>
            </div>
        
        </div>

     <!-- Tags Card -->
        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding ">
                 <h>Tags</h>
            </div>
            <div class="w3-container2">
                <p0>        
                    <span class="w3-tag w3-light-black w3-small w3-margin-bottom"><?php echo $tags ?> </span>
                </p0>
            </div>
        </div>

        <!-- Favorite/Unfavorite Button -->
        <?php
           	$sqlFavorites = "SELECT * FROM favorites";
            $queryFavorites = mysqli_query($conn, $sqlFavorites);
            $text = "Favorite";

			// Loops through favorites table to determine if activity is favorited by user
            while($rowFavorites = mysqli_fetch_assoc($queryFavorites)) 
            {
                //Check if activity favorited is current activity displayed and if user that favorited it is current user
                if($rowFavorites['activityid'] == $activityid && $rowFavorites['userid'] == $_SESSION['uid'])
                {
                    $text = "Unfavorite";
                }
            }
        ?>
    
        <form action="includes/favorite-helper.php" method="POST" enctype="multipart/form-data">
            <div class="w3-card w3-margin button">
                <div class="w3-container w3-padding ">
                     <button class ="button" type ="submit" name ="<?php echo $text?>"><?php echo $text?></button>
                </div>
            </div>
        </form>
    </div>
</div>
</main>
</html>
