<?php
    require 'includes/dbhandler.php';
    include "includes/header.php" ;
    
    if(isset($_POST['new']) && $_POST['new']==1){
        $name = $_REQUEST['actname'];
        $location = $_REQUEST['actlocation'];
        $description = $_REQUEST["actdescription"];
        $open = $_REQUEST['open'];
        $close = $_REQUEST['close'];
        $tags = $_REQUEST['acttags'];
        $fakes = $_REQUEST['fakes'];
        $ins_query="INSERT INTO activities
        (`name`,`location`,`description`, `open`, `close`, `tags`, `fakes`) VALUES
        ('$name','$location','$description','$open', '$close', '$tags', '$fakes');";
        mysqli_query($conn,$ins_query)
        or die(mysql_error());
    }

    if(isset($_POST['activity-submit'])) {
        header("Location: delete.php");
    }
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Insert New Activity</title>
    <link rel="stylesheet" href="css/reviewsuggestions.css" />
</head>

<script>
    //Listens for click event on profile picture
    function triggered() 
    {
        document.querySelector("#act-image").click();
    }

    //When profile picture clicked on, opens file explorer and shows the new profile picture that the user selects
    function preview(e) 
    {
        if (e.files[0]) 
        {
            var reader = new FileReader();
            reader.onload = function(e) 
            {
                document.querySelector('#act-display').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>

<body>
    <div class="form">
        <h1>Insert New Activity</h1>
        <form name="form" method="post" action="">
            <input type="hidden" name="new" value="1" />
            <div class="form-group">
                <img src="images/default.png" alt="profile pic" onclick="triggered();" id="act-display">
                <input type="file" name="pic1" id="act-image" onchange="preview[this]" class="form-control"
                    style="display: none;">
                <img src="images/default.png" alt="profile pic" onclick="triggered();" id="act-display">
                <input type="file" name="pic2" id="act-image" onchange="preview[this]" class="form-control"
                    style="display: none;">
            </div>
            
            <?php
                $id = $_GET['id'];
                $act_query="SELECT * FROM suggestions WHERE sid='$id';";
                $result = mysqli_query($conn,$act_query);
                $row = mysqli_fetch_assoc($result)
            ?>

            <p><input type="text" name="actname" placeholder="Enter Name" value="<?php echo $row['name'] ?>" required />
            </p>
            <p><input type="text" name="actdescription" placeholder="Enter Description"
                    value="<?php echo $row['description'] ?>" required /></p>
            <p><input type="text" name="actlocation" placeholder="Enter Location" value="<?php echo $row['location'] ?>"
                    required /></p>
            <p><input type="text" name="open" placeholder="Enter Opening Time" required /></p>
            <p><input type="text" name="close" placeholder="Enter Closing Time" required /></p>
            <p><input type="text" name="acttags" placeholder="Enter Tag(s)" value="<?php echo $row['tags'] ?>"
                    required /></p>
            <p><input type="text" name="fakes" placeholder="Enter Fakes" required /></p>
            <div class="form-group">
                <button type="submit" name="activity-submit" class="btn btn-lg btn-outline-warning btn-block">Insert
                    Activity</button>
            </div>
        </form>
    </div>
</body>

</html>