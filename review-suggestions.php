<?php
require 'includes/header.php';
?>

<main>
    <link rel="stylesheet" href="css/reviewsuggestions.css">

    <h1>Review Suggestions</h1>
    <div class="reviewsuggestions-container">

        <?php
            include_once 'includes/dbhandler.php';
            $sql = "SELECT * FROM suggestions ORDER BY upload_date DESC";
            $query = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($query)) {
                echo '    <div class="card">
                <a href="suggestions.php?id='.$row['sid'].'">
                <h3>'.$row["name"].'</h3>
                <p>'.$row["address"].'</p>
                </a>
               </div>';
            }
        ?>
    </div>


</main>