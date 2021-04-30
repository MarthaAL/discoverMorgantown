<?php
include 'includes/header.php';
require 'includes/dbhandler.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>View Records</title>
    <link rel="stylesheet" href="css/reviewsuggestions.css" />
</head>

<body>
    <div class="form">
        <h2>View Suggestions</h2>
        <table width="100%" border="1" style="border-collapse:collapse;">
            <thead>
                <tr>
                    <th><strong>S.No</strong></th>
                    <th><strong>Name</strong></th>
                    <th><strong>Location</strong></th>
                    <th><strong>Description</strong></th>
                    <th><strong>Tags</strong></th>
                    <th><strong>Upload Date</strong></th>
                    <th><strong>Insert</strong></th>
                    <th><strong>Delete</strong></th>
                </tr>
            </thead>
            <tbody>
                <?php
$count=1;
$sel_query="SELECT * FROM suggestions ORDER BY sid ASC;";
$result = mysqli_query($conn,$sel_query);
while($row = mysqli_fetch_assoc($result)) { ?>
                <tr>
                    <td align="center"><?php echo $count; ?></td>
                    <td align="center"><?php echo $row['name']; ?></td>
                    <td align="center"><?php echo $row['location']; ?></td>
                    <td align="center"><?php echo $row['description']; ?></td>
                    <td align="center"><?php echo $row['tags']; ?></td>
                    <td align="center"><?php echo $row['upload_date']; ?></td>
                    <td align="center">
                        <a href="insert.php?id=<?php echo $row['sid']; ?>">Insert</a>
                    </td>
                    <td align="center">
                        <a href="delete.php?id=<?php echo $row['sid']; ?>">Delete</a>
                    </td>
                </tr>
                <?php $count++; } ?>
            </tbody>
        </table>
    </div>
</body>

</html>