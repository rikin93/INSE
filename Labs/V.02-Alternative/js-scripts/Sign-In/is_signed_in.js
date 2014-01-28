// the connection has to be established and gapi library available at the moment of using this script

if (!isSignedIn()) {
     window.location = "./signed_in_needed.php";
}
else {
    // ok, logged in
}
   