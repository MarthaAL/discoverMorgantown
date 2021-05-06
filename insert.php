<?php
    require 'includes/dbhandler.php';
    include "includes/header.php" ;
    isLoggedIn();
    $uname = $_SESSION['uname'];
    $sqlpro = "SELECT * FROM users WHERE uname='$uname';";
    $res = mysqli_query($conn, $sqlpro);
    $row = mysqli_fetch_array($res);
    $admin = $row['admin'];
    
        if($admin != 1){
            header("Location: ../mustbeadmin.php");
            exit();
        }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Insert New Activity</title>
    <link rel="stylesheet" href="css/reviewsuggestions.css" />
</head>

<script>
//Listens for click event on profile picture
function triggered1() {
    document.querySelector("#act-image1").click();
}

function triggered2() {
    document.querySelector('#act-image2').click()
}

//When profile picture clicked on, opens file explorer and shows the new profile picture that the user selects
function preview1(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#act-display1').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}

function preview2(e) {
    if (e.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            document.querySelector('#act-display2').setAttribute('src', e.target.result);
        }
        reader.readAsDataURL(e.files[0]);
    }
}
</script>

<body>
    <div class="form">
        <h1>Insert New Activity</h1>
        <form name="form" method="post" action="includes/activityupload-helper.php" enctype="multipart/form-data">
            <input type="hidden" name="new" value="1" />
            <div class="form-group">
                <img src="images/default.png" alt="profile pic" onclick="triggered1();" id="act-display1">
                <input type="file" name="pic1" id="act-image1" onchange="preview1(this)" class="form-control"
                    style="display: none;">
                <img src="images/default.png" alt="profile pic" onclick="triggered2();" id="act-display2">
                <input type="file" name="pic2" id="act-image2" onchange="preview2(this)" class="form-control"
                    style="display: none;">
            </div>

            <?php
                $id = $_GET['id'];
                $act_query="SELECT * FROM suggestions WHERE sid='$id';";
                $result = mysqli_query($conn,$act_query);
                $row = mysqli_fetch_assoc($result);

                $name = $row['name'];
                $description = $row['description'];
                $location = $row['location'];
                $tags = $row['tags'];
            ?>

            <p><input type="text" name="actname" placeholder="Enter Name" value="<?php echo $row['name']?>" required />
            </p>
            <p><input type="text" name="actdescription" placeholder="Enter Description" value="<?php echo $row['description']?>" required /></p>
            <p><input type="text" name="actlocation" placeholder="Enter Location" value="<?php echo $row['location']?>"" required /></p>
            <p><input type="text" name="cost" placeholder="Enter the Cost" required /></p>
            <p><input type="text" name="open" placeholder="Enter Opening Time" required /></p>
            <p><input type="text" name="close" placeholder="Enter Closing Time" required /></p>
            <p><input type="text" name="acttags" placeholder="Enter Tag(s)" value="<?php echo $row['tags']?>" required /></p>
            <p><input type="text" name="fakes" placeholder="Enter Fakes" required /></p>
            <p><input type="hidden" name="id" value="<?php echo $id ?>"/></p>
            <div class="form-group">
                <button type="submit" name="activity-submit" class="btn btn-lg btn-outline-warning btn-block">Insert
                    Activity</button>
            </div>
        </form>
    </div>
</body>

</html>

<?php
include 'includes/footer.php';
?>
