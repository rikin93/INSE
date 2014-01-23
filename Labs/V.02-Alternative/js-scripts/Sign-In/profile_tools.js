// @description
// callback function after authentification is done
// 
// @history 
// 6.1.2014   document created
// 10.1.2014 library has been made from this document
//      function related to connected user are stored here
//      callback function for logging added - here can be set what will happen after user is logged in
//23.1.2014

/**
 * Global variables to hold the profile and email data.
 */
var profile;

/**
 * Starts post-autorization procedures which can be defined by programmer
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
    if (authResult) {
        if (authResult['error'] == undefined) {
            toggleElement('signin-button'); // Hide the sign-in button after successfully signing in the user.
            gapi.client.load('plus', 'v1', loadProfile);  // Trigger request to get the email address.
        } else {
            console.log('An error occurred');
        }
    } else {
        console.log('Empty authResult');  // Something went wrong
    }
}



/**
 * Calls the OAuth2 endpoint to disconnect the app for the user.
 */
function disconnect() {
    // Revoke the access token.
    profile = null;
    localStorage.removeItem("profile");
    $.ajax({
        type: 'GET',
        url: 'https://accounts.google.com/o/oauth2/revoke?token=' +
                gapi.auth.getToken().access_token,
        async: false,
        contentType: 'application/json',
        dataType: 'jsonp',
        success: function(result) {
            console.log('revoke response: ' + result);
        },
        error: function(e) {
            console.log(e);
        }
    });
}
/**
 * Loads the profile of current user
 */
function loadProfile() {
    var request = gapi.client.plus.people.get({'userId': 'me'});
    request.execute(loadProfileCallback);
}

/**
 * Callback for asynchronous request for loading the profile
 * @param {object} obj represents profile of currently logged user
 */
function loadProfileCallback(obj) {
    profile = obj;
    localStorage.setItem("profile", profile);
}

/*
 * Gets name of current user
 */
function getCurrentUserName() {
    profile = localStorage.getItem("profile");

    return profile.displayName;
}

/*
 * Gets link to avatar of current user
 * example use of this function: <img src="getCurrentUserAvatarLink();"></img>
 */
function getCurrentUserAvatarLink() {
    profile = localStorage.getItem("profile");
    return profile.image.url;
}

function isSignedIn() {
    profile = localStorage.getItem("profile");
    if (profile == undefined) {
        return false;
    } else {
        return true;
    }
}


