<?php
require 'includes/header.php';


    include_once 'includes/dbhandler.php';
    $sql = "SELECT * FROM activities WHERE itemid='1'";
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    $name = $row['name'];
    $descript = $row['description'];
    $open = $row['open'];
    $close = $row['close'];
    $location = $row['location'];
    $cost = $row['cost'];
    $tags = $row['tags'];
    $pic = $row['pic'];
    $fakes = $row['fakes'];
    ?>


<!--<link rel="stylesheet" href="../css/test2.css"> -->
<html>
<link rel="stylesheet" href="/css/activitydisplay.css">

<title>W3.CSS Template</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">

<main>
<body class="w3-light-grey">
<!-- Defines White space margins on side -->
<div class="w3-content" style="max-width:1500px">


<!-- Grid -->
<div class="w3-row">

<!-- Groups all info cards together under Grid -->
<div class="w3-rest">
  <!-- Creates Top Activity Card -->
  <div class=" w3-card-4 w3-margin">
  
    <!-- Title -->
    <div class="w3-container w3-center">
      <h0> <?php echo $name ?> </h0>
      <br>
      <hours>Hours: <?php echo substr($open, 1, 4) ?>AM - <?php echo substr($close, 1, 4)?>PM </hours>
    </div>

    <!-- Images -->
    <div class="w3-container" >
      <img class = "img1" src= <?php echo $pic ?> >
      <img class = "img2" src= <?php echo $pic ?> >
      
      
    </div>
 </div>
  <hr>
</div>

<div class="w3-row">
    <div class="w3-col l8 s12">
        <div class="w3-card-4 w3-margin">
        
        <!-- Details Card -->
         <div class="w3-container">
             <h>Details:</h>
              <sh class="w3-opacity"> <br>Last Updated: April 9, 2021 </sh>
            </div>
        
            <div class="w3-container2">
                <p>  <?php echo $descript ?> 
                    <br>         </p>

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
        <!-- Reviews Card -->
        <div class="w3-card-4 w3-margin">
        
            <div class="w3-container">
             <h>Reviews</h>
             
            </div>
        
            <div class="w3-container2">
                <p>This Feature may or may not be Coming Soon!!!!
                </p>
            </div>
        </div>
    </div>


<!-- Location + Info Card -->
    <div class="w3-col l4">

        <div class="w3-card w3-margin">
            <div class="w3-container w3-padding">
                <h>Location and Contact Information</h>
            </div>
            <div class="w3-container2">
                <p0>Location: </p0>
                <p> <?php echo $location ?> <br> </p>
                <p0> Contact Info: </p0>
                <p> </p>
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
    </div>

</div>
</main>
</html>
