<!DOCTYPE HTML>
<html>
    <head>
        <title>Planning tool for UoP students - projects list</title>
        <script src="js-scripts/Sign-In/google_plus_script.js" type="text/javascript"></script>
        <!-- Google's JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js" ></script>
        <script src="js-scripts/tools.js" type="text/javascript"></script>
        <script src="js-scripts/Sign-In/profile_tools.js" type="text/javascript"></script>
        <script src="js-scripts/Sign-In/is_signed_in.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="styles/style.css" />
        <link rel="stylesheet" type="text/css" href="styles/customButton.css" />
        <script src="js-scripts/projects_ajax.js" type="text/javascript"/></script>
</head>
<body>
    <header>
        <h2>
            <script type="text/javascript">
                document.write("Here's your project list " + getCurrentUserName());
            </script>
        </h2>
        <!-- Sign-out button -->
        <div id="signout-button" class="customButton">
            <button id="g-signout"
                    style="background:transparent; border:none;"
                    onclick="javascript:disconnect();"
                    >
                Sign out
            </button>
        </div>
    </header>
    <!-- Here will be project list--> 
    <div id="new-project">
        <input type="text" id="projectname" style="color: #000;">
        <button style="margin-left:10px;" class="customButton" onclick="javascript: addProject();">Add project</button>
    </div>
    <div id="mainBody">
    </div>
</body>
</html>