<!DOCTYPE HTML>
<html>
    <head>
        <script src="js-scripts/google_plus_script.js" type="text/javascript"></script>
        <!-- Google's JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <script src="js-scripts/signin_misc.js" type="text/javascript"></script>
    </head>
    <body>
        <header>
            <h2>We need a project name</h2>
            <p>For our project!</p>
            <div id="signinButton">
                <button class="g-signin"
                        data-scope="https://www.googleapis.com/auth/plus.login"
                        data-requestvisibleactions="http://schemas.google.com/AddActivity"
                        data-clientId="156807246102-njiq7taooltr8u5t1jc6atj716pfeh18.apps.googleusercontent.com"
                        data-callback="onSignInCallback"
                        data-theme="dark"
                        data-cookiepolicy="single_host_origin">
                </button>
            </div>
        </header>
    </body>

</html>