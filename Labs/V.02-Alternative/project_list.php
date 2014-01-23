<!DOCTYPE HTML>
<html>
    <head>
        <title>Planning tool for UoP students - projects list</title>
        <script src="js-scripts/tools.js" type="text/javascript"></script>
        <script src="js-scripts/Sign-In/profile_tools.js" type="text/javascript"></script>
        <link rel="stylesheet" type="text/css" href="style.css" />
    </head>
    <body>
        <h2>Do the project list page layout</h2>
        <button onclick="document.write(getCurrentUserName());"></button>
          <script type="text/javascript">
            if(isSignedIn()){
                document.write("ano");
            }else{
                document.write("ne");
            }
            </script>
    </body>
</html>