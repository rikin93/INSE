<!DOCTYPE HTML>
<html>
    <head>
        <title>Planning tool for UoP students</title>
        <script src="js-scripts/Sign-In/google_plus_script.js" type="text/javascript"></script>
        <!-- Google's JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
        <script src="js-scripts/tools.js" type="text/javascript"></script>
        <script src="js-scripts/Sign-In/profile_tools.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <link rel="stylesheet" type="text/css" href="styles/signoutButton.css" />
    </head>
    <body>
        <header>
            <h2>We need a project name</h2>
            <p>For our project!</p>
            <div id="signin-button">
                <button class="g-signin"
                        data-scope="https://www.googleapis.com/auth/plus.login"
                        data-requestvisibleactions="http://schemas.google.com/AddActivity"
                        data-clientId="156807246102-a404t4r0gque0bi3a4bkch68csbmidop.apps.googleusercontent.com"
                        data-callback="onSignInCallback"
                        data-theme="dark"
                        data-cookiepolicy="single_host_origin">
                </button>
            </div>
            <!-- Sign-out button -->
            <div id="signout-button" style="display: none;">
                <button id="g-signout"
                        style="background:transparent; border:none;"
                        onclick="javascript:disconnect();"
                >
                Sign out
                </button>
            </div>
        </header>
    </body>


</html>