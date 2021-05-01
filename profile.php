<?php
//If the user is logged in, displays their profile picture, full name, username, and email. 
//Additionally, the user can click on their profile picture and select a new picture which is then previewed.
//If the user clicks the button, the new picture will be uploaded and saved.

require 'includes/header.php';
require 'includes/dbhandler.php';
isLoggedIn();
?>

<link rel="stylesheet" href="css/profile.css">

<script>
    //Listens for click event on profile picture
    function triggered() 
    {
        document.querySelector("#prof-image").click();
    }

    //When profile picture clicked on, opens file explorer and shows the new profile picture that the user selects
    function preview(e) 
    {
        if (e.files[0]) 
        {
            var reader = new FileReader();
            reader.onload = function(e) 
            {
                document.querySelector('#prof-display').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<?php
        //Check that user is logged in
        if(isset($_SESSION['uid']))
        {
            //Get username, first name, last name, email, and profile picture
            $uname = $_SESSION['uname'];
            $sqlpro = "SELECT * FROM profiles WHERE uname='$uname';";
            $res = mysqli_query($conn, $sqlpro);
            $row = mysqli_fetch_array($res);
            $fname = $row['fname'];
            $lname = $row['lname'];
            $email = $row['email'];
            $photo = $row['profpic'];
?>

<div class="container mt-5 d-flex justify-content-center">
<form action="includes/upload-helper.php" method="POST" enctype="multipart/form-data">
    <div class="card p-3">
        <div class="d-flex align-items-center">
            <!--Profile picture can be clicked and changed-->
            <div class="image">
                 <img src="<?php echo $photo;?>" class="rounded" width="155" alt="profile pic" onclick="triggered();" id="prof-display"> 
            </div>
            <input type="file" name="prof-image" id="prof-image" onchange="preview(this)" class="form-control" style="display: none;">

            <!--User's full name, username, and email-->
            <div class="ml-3 w-100">
                <h4 class="mb-0 mt-0"><?php echo $fname?> <?php echo $lname?></h4>
                <span>Username: <?php echo $uname?></span>
                <br/>
                <span>Email: <?php echo $email?></span>

            <!--Button to upload new profile picture-->
            <div class="button mt-2 d-flex flex-row align-items-center"> 
                <button class="btn w-100 upload" type="submit" name="prof-submit">Upload Profile Picture</button>
            </div>
            </div>
        </div>
    </div>
</div>

<?php
        }
?>

<?php
include 'includes/footer.php';
?>