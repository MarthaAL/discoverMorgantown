<?php
require 'includes/header.php';
?>

<main>
    <link rel="stylesheet" href="css/login.css">
    <div class="bg-cover">
        <div class="h-40 center-me">
            <div class="my-auto">
                <form class="form-login" action="includes/login-helper.php" method="post">
                    <h1>Log In</h1>
                    <p class="hint-text">Let's discover together!</p>
                    <div class="form-group">
                        <input type="text" class="form-control" name="uname-email" placeholder="Username/Email"
                            required="required">
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pwd" placeholder="Password"
                            required="required">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="login-submit" class="btn btn-lg btn-outline-warning btn-block">Log
                            In</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</main>