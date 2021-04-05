<?php
require "includes/header.php"
?>

<main>
<link rel="stylesheet" href="css/signup.css">
    <div class="bg-cover">
        <div class="h-40 container center-me">
            <div class="my-auto">
                <div class="form-signup">

                    <form action="includes/signup-helper.php" method="post">

                        <h1 >Sign Up</h1>
                        <p class="hint-text">Create your account!</p>
                        <div class="form-group">
                            <div class="row">
                                <div class="col">
                                    <input type="text" class="form-control" name="fname" placeholder="First Name" required autofocus>
                                </div>
                                <div class="col">
                                    <input type="text" class="form-control" name="lname" placeholder="Last Name" required autofocus>
                                </div>
                            </div>
                        </div>
                        <input type="text" class="form-control" name="uname" placeholder="Username" required autofocus>

                        <label for="inputEmail" class="sr-only">Email</label>
                        <input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required
                            autofocus>

                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="inputPassword" class="form-control" name="pwd" placeholder="Password" required>
                        <label for="inputPassword" class="sr-only">Confirm Password</label>
                        <input type="password" id="inputPassword" class="form-control" name="con-pwd" placeholder="Confirm Password"
                            required>

                        <button class="btn btn-lg btn-outline-warning btn-block" name="signup-submit" type="submit">Register</button>

                    </form>
                </div>

            </div>
        </div>
    </div>
</main>