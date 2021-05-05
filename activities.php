<!doctype html>
<?php
require 'includes/header.php';
isLoggedIn();
?>
<html lang="en" class="no-js">
<head>
	<title>Activity Gallery</title>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="css/activities-reset.css"> <!-- CSS reset -->
	<link rel="stylesheet" href="css/activities.css"> <!-- Resource style -->
	<script src="js/modernizr.js"></script> <!-- Modernizr -->
</head>


<body>
	<header class="cd-header">
		<h1 style="font-size: 60px;">Activities</h1>
	</header>

		<!-- Displays Filter Bar -->
	<main class="cd-main-content">
		<div class="cd-tab-filter-wrapper">
			<div class="cd-tab-filter">
				<ul class="cd-filters"></ul>
			</div>
		</div>

		<!-- Displays activity gallery -->
		<section class="cd-gallery">
			<ul>
			<?php
           			include_once 'includes/dbhandler.php';
           			$sql = "SELECT * FROM activities";
            		$query = mysqli_query($conn, $sql);

					// Loops through activities table to display in gallery
            		while($row = mysqli_fetch_assoc($query)) {
						// Replaces commas in between tags with whitespace
						$tags = str_replace(',', ' ', $row['tags']);

					// Creates a new activity entry that belongs to classes of its name and tags (allows for filtering); provides link to its individual page
                	echo '<li class="mix '.$row['name'].' '.$tags.'">
                        <a href="activitydisplay.php?id='.$row['itemid'].'">
                        <img src="'.$row["pic1"].'">
                        <h3 style="text-align: center;">'.$row["name"].'</h3>
                        </a>
                    	</li>';
            		}
        		?>
				<li class="gap"></li>
				<li class="gap"></li>
				<li class="gap"></li>
			</ul>
			<!-- Displays "No results found" if filter has no results -->
			<div class="cd-fail-message">No results found</div>
		</section>

		<!-- Displays filter options in side menu -->
		<div class="cd-filter">
			<form>

				<!-- Search filter -->
				<div class="cd-filter-block">
					<h4>Search</h4>
					
					<div class="cd-filter-content">
						<input type="search" placeholder="...">
					</div> <!-- cd-filter-content -->
				</div> <!-- cd-filter-block -->

				<!-- Categories checkbox filter -->
				<div class="cd-filter-block">
					<h4>Categories</h4>

					<ul class="cd-filter-content cd-filters list">
						<li>
							<input class="filter" data-filter=".outdoor" type="checkbox" id="outdoor">
			    			<label class="checkbox-label" for="outdoor">Outdoor</label>
						</li>

						<li>
							<input class="filter" data-filter=".restaurant" type="checkbox" id="restaurant">
							<label class="checkbox-label" for="restaurant">Restaurant</label>
						</li>

						<li>
							<input class="filter" data-filter=".volunteer" type="checkbox" id="volunteer">
							<label class="checkbox-label" for="volunteer">Volunteer</label>
						</li>

                       				<li>
							<input class="filter" data-filter=".nightlife" type="checkbox" id="nightlife">
							<label class="checkbox-label" for="nightlife">Nightlife</label>
						</li>
						
						<li>
							<input class="filter" data-filter=".retail" type="checkbox" id="retail">
							<label class="checkbox-label" for="retail">Retail</label>
						</li>
					</ul>
				</div>
			</form>

			<a href="#0" class="cd-close">Close</a>
		</div>

		<a href="#0" class="cd-filter-trigger">Filters</a>
	</main>

<!-- JavaScript scripts -->
<script src="js/jquery-2.1.1.js"></script>
<script src="js/jquery.mixitup.min.js"></script>
<script src="js/main.js"></script> <!-- Resource jQuery -->

</body>
</html>

<?php
include 'includes/footer.php';
?>
