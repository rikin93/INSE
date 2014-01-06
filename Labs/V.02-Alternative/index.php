<!DOCTYPE HTML>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="js-scripts/sign_in_callback.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h2>We need a project name</h2>
            <p>For our project!</p>
            <span id="signinButton">
                <span
                    class="g-signin"
                    data-callback="signinCallback"
                    data-clientid="156807246102-njiq7taooltr8u5t1jc6atj716pfeh18.apps.googleusercontent.com"
                    data-cookiepolicy="single_host_origin"
                    data-requestvisibleactions="http://schemas.google.com/AddActivity"
                    data-scope="https://www.googleapis.com/auth/plus.login">
                </span>
            </span>
        </header>

        <?php
        //Google+ sign-in script has to be placed exactly before closing body tag
        ?>
        <script src="js-scripts/google_plus_script.js" type="text/javascript"></script>
    </body>
</html>