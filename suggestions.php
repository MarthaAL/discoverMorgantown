<?php
    require "includes/header.php" // header for all webpages
?>

<body>
    <!-- Uses same design as signup page -->
    <link rel="stylesheet" href="css/signup.css">
    <div class="bg-cover">
        <div class="h-40 container center-me">
            <div class="my-auto">
                <div class="form-signup">

                    <form action="includes/suggestions-helper.php" method="post">
                        <!-- Area for input: the name of the activity, location, a description, and possible tags -->
                        <h1>Suggestion</h1>
                        <p class="hint-text">Tell us about a new activity not already on our website!</p>

                        <label for="inputName" class="sr-only">Activity/Location Name</label>
                        <input type="text" class="form-control" name="name" placeholder="Activity/Location Name"
                            required autofocus>

                        <!-- Area for input: the location of the activity -->
                        <label for="inputAddress" class="sr-only">Address</label>
                        <input type="address" id="inputAddress" class="form-control" name="location"
                            placeholder="Address" required autofocus>

                        <!-- Area for input: a description of the activity -->
                        <label for="inputDescription" class="sr-only">Tell us what you know about it!</label>
                        <div class="form-group">
                            <textarea name="description" id="bio" cols="30" rows="10" placeholder="Description"
                                style="text-align: center;"></textarea>
                        </div>

                        <!-- Area for input:possible tags for the activity -->
                        <label for="inputTags" class="sr-only">Possible Tag(s)</label>
                        <input type="tags" id="inputTags" class="form-control" name="tags" placeholder="Tag(s)"
                            required>
                        <h6>Tag Options: nightlife, outdoor, restaurant, and volunteer</h6>

                        <button class="btn btn-lg btn-outline-warning btn-block" name="suggestion-submit"
                            type="submit">Submit Suggestion</button>

                    </form>

                </div>
            </div>
        </div>
    </div>
</body>