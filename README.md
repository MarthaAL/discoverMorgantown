# WVU_CS230_2021.01_Group03

Project Title
Welcome to Discover Morgantown! This is a travel guide for West Virginia University students. Browse various activities to do in Morgantown, including outdoor activities, night-life, events, retail locations, restaurants, and volunteer activities to participate in. When you are searching for the right activity for you, search by a category tag word. Comment on activities that you’ve done so that others can see what you thought of it. Favorite activities that you really liked so that you can easily find them later. If there’s an activity that isn’t on the website, suggest if for the administration to add to the site.

Motivation
This website was built for students by students. Our goal is to create a place where WVU students can explore Morgantown and talk about their experiences with other WVU students. The website was intended to be a platform for students to get inspiration and information on the beautiful hotspots and hidden gems of Morgantown.

Screenshots

![alt text](https://github.com/tdevine1/WVU_CS230_2021.01_Group03/blob/master/images/signup.png?raw=true)
sign up page

![alt text](https://github.com/tdevine1/WVU_CS230_2021.01_Group03/blob/master/images/login.png?raw=true)
log in page

![alt text](https://github.com/tdevine1/WVU_CS230_2021.01_Group03/blob/master/images/profile.png?raw=true)
profile page

![alt text](https://github.com/tdevine1/WVU_CS230_2021.01_Group03/blob/master/images/activities.png?raw=true)
activities page

map page

submit suggestion page

view suggestions page

insert activity page

Tech/framework used
Built with:
Visual Studio Code
Amazon Lightsail

Features
A user is able to view various activities within the Morgantown area. Users are able to search the activities using a filter or by typing their search in the search field. These features are within the “filter” side bar on the activities page. If a user sees an activity they think they would enjoy, then they can “favorite” the activity to view it later within their profile’s favorited items. Users also have the capability of telling other users about an activity by commenting on a specific activity page. All of these activities’ locations are displayed in the built-in map. These activities are produced by an admin approving other users suggestions, all handled by a suggestions and review page.

Code Example
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


Tests

1. Sign Up
    First Name =  name; Last Name = name; Username = username; Email = email; Password = password; Confirm Password = same password  →  profile page
    First Name =  name; Last Name = name; Username = existing username; Email = email; Password = password; Confirm Password = same password  →  sign up error
    First Name =  name; Last Name = name; Username = name; Email = existing email; Password = password; Confirm Password = same password  →  sign up error
    First Name =  name; Last Name = name; Username = username; Email = email; Password = password; Confirm Password = different password  →  sign up error
    First Name =  sql injection; Last Name = sql injection; Username = sql injection; Email = sql injection; Password = sql injection; Confirm Password = sql injection  →  sign up error
    Submitting form will add the following user data to the “user” table in the database.
2. Log In
    Username/Email = existing username; Password = matching password → profile page
    Username/Email = existing username; Password = not matching password → log in error
    Username/Email = not existing username; Password = any password → log in error
3. Update Profile Picture
    Picture = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB → picture updated
    Picture = file with extension that is not jpg, jpeg, png, or svg → upload error
    Picture = file with size greater than 4 MB → upload error
    Upload form will add the following user data to the “profile” table in the database.
4. Favorite/Unfavorite Activities
    Button appears on each activity page. 
    Clicking favorite button → activity displayed in “Favorited Activities” gallery page
    Clicking unfavorite button →  activity removed from “Favorited Activities” gallery page
    Favorite form will add/remove the activity to the user’s “favorites” database table.
5. Filter and Search Activities
    Search for keyword that an activity has in its name → activities with those words appear
    Search for keyword that no activity has in its name → “No Results Found” 
    Select checkbox(es) for category tags → activities with that(those) category tag(s) appear
    Select checkbox(es) for category tags that no activity has → “No Results Found” 
    Search for keyword that an activity has in its name and select checkbox(es) for category tags  → activities with those words and with that(those) category tag(s) appear
    Search for keyword that no activity has in its name and select checkbox(es) for category tags  → “No Results Found” 
    Search for keyword that an activity has in its name and select checkbox(es) for category tags that no activity has → “No Results Found” 
    Search for keyword that no activity has in its name and select checkbox(es) for category tags that no activity has → “No Results Found” 
6. Suggest Activities
    If logged in as a user, the header will display a “Suggestions” tab. 
    If pressed, the page appears with four fill in bars; Activity Name, Address, Description, Tags. 
    Activity Name =  name; Address = address; Description = description; Tags = tags; → suggestions page
    Activity Name =  sql injection; Address = sql injection; Description = sql injection; Tags = sql injection; → submit error
    After inserting each of the bars with the appropriate content, press the button below the four bars labeled “Submit Suggestion” to submit the suggestion to the admin for approval.
7. Insert Suggestions (Admin functionality)
    The list of suggestions appear in a table format (name of the activity, location, description, and possible tags) where a link to insert.php is shown in the second to last column.
    After clicking “Insert”, the page shows several columns where the admin can edit the name of the activity, location, description, tags, whether fakes are allowed, opening time, closing time, and two pictures.
    Picture 1 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Picture 2 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Activity Name =  name; Address = address; Description = description; Opening Time = time; Closing Time = time; Tags = tags; Fakes = fakes → suggestions page
    Picture 1 = file with extension that is not jpg, jpeg, png, or svg; Picture 2 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Activity Name =  name; Address = address; Description = description; Opening Time = time; Closing Time = time; Tags = tags; Fakes = fakes → “Insert Error”
    Picture 1 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Picture 2 = file with extension that is not jpg, jpeg, png, or svg; Activity Name =  name; Address = address; Description = description; Opening Time = time; Closing Time = time; Tags = tags; Fakes = fakes → “Insert Error”
    Picture 1 = file with size greater than 4 MB; Picture 2 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Activity Name =  name; Address = address; Description = description; Opening Time = time; Closing Time = time; Tags = tags; Fakes = fakes → “Insert Error”
    Picture 1 = file with extension that is jpg, jpeg, png, or svg and is less than 4 MB; Picture 2 = file with size greater than 4 MB; Activity Name =  name; Address = address; Description = description; Opening Time = time; Closing Time = time; Tags = tags; Fakes = fakes → “Insert Error”
    After selecting “Insert Activity”, the suggestion is added to the activities database and deleted from the suggestions database.
8. Delete Suggestions (Admin functionality)
    The list of suggestions appear in a table format (name of the activity, location, description, and possible tags) where a link to delete.php is shown in the last column.
    Clicking delete button → the suggestion is removed from the database and the suggestion is no longer seen in the table of suggestions.
9. Navigational Header
    Not logged in → Log In, Sign Up, About Us
    Logged in as user → Activities, Suggestions, About Us tabs, Profile, Favorites, and Sign Out tabs
    Logged in as admin → Activities, Review Suggestions, About Us, Profile, Favorites, and Sign Out tabs
    A navigation bar appears at the top of every page with clickable buttons each taking the user or admin to its respective page.
    The profile icon picture matches the user’s profile picture.
    The profile icon dropdown menu links send the user to the appropriate page.
    Not logged in and goes to activities.php → “Must be logged in”
    Not logged in and goes to activitydisplay.php → “Must be logged in”
    Not logged in and goes to suggestions.php → “Must be logged in”
    Not logged in and goes to profile.php → “Must be logged in”
    Not logged in and goes to favorites.php → “Must be logged in”
    Not logged in and goes to review-suggestions.php → “Must be logged in”
    Not logged in and goes to insert.php → “Must be logged in”
    Logged in as user and goes to review-suggestions.php → “No access” 
    Logged in as user and goes to insert.php → “No access” 
10. Comments
    A comment box appears at the bottom of every activity display page with a text box and submit button. 
    Not logged in and comment = comment → “Error”
    Comment = comment → activity page
    After clicking submit the comment will appear above the text box in the comment section displaying the user’s profile picture, username, and date and time posted on the activity page the user was on. 

How to use?
1. Create an account on the website
2. Browse Activities through the activities tab
3. Comment on activities at the bottom of each activity page
4. Favorite Activities on the bottom right of each activity page
5. View activities’ locations on the map page
6. Suggest Activities through the tab on the header
7. View your profile and favorited activities on the top right by the profile icon

Contribute
Please add any suggestions for activities that you think should be a part of our website! We want your experience at WVU to be the best, which means knowing about the best activities around. 

Credits
Authors: Heather Fetty, Harley Frazee, Katilyn Hepler, Delaney Irwin, Martha Lacek, Alexander Royce, Matthew Towey, and Callyn Zeigler
