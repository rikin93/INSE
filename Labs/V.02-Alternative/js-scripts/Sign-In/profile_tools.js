// @description
// callback function after authentification is done
// 
// @history 
// 6.1.2014   document created
// 10.1.2014 library has been made from this document
//      function related to connected user are stored here
//      callback function for logging added - here can be set what will happen after user is logged in
//23.1.2014 functions made simpler to maintain
//28.1.2014 paramteres stored in cookies

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
            gapi.client.load('plus', 'v1', loadProfile);  // Trigger request to get iser info
            $("#signin-button").hide();

            $("#signout-button").show();

        } else {
            console.log('An error occurred');
        }
    } else {
        console.log('Empty authResult');  // Something went wrong
    }
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
    if (!isSignedIn()) {
        storesUserInfo(5);
        window.location = "./project_list.php";
    }

}



function storesUserInfo(exdays)
{
    var d = new Date();
    d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
    var expires = "expires=" + d.toGMTString();
    document.cookie = "name=" + profile.displayName + "; avatarlink= " + profile.image.url + ";" + expires;
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
    $("#signin-button").show();
    $("#signout-button").hide();
    deletesUserInfo();
}

/*
 * Deletes user info from cookies
 */
function deletesUserInfo() {
    document.cookie = "name=;avatarlink=; expires=Thu, 01 Jan 1970 00:00:00 GMT";
}

/*
 * Gets name of current user, returns name if user is connected, empty string otherwise
 */
function getCurrentUserName() {
    var name = "name=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++)
    {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

/*
 * Gets link to avatar of current user. Returns link if user is connected, empty string otherwise
 * example use of this function: <img src="getCurrentUserAvatarLink();"></img>
 */
function getCurrentUserAvatarLink() {
    var name = "avatarlink=";
    var ca = document.cookie.split(';');
    for (var i = 0; i < ca.length; i++)
    {
        var c = ca[i].trim();
        if (c.indexOf(name) == 0)
            return c.substring(name.length, c.length);
    }
    return "";
}

/*
 * Checks if the user is logged in
 */
function isSignedIn() {
    var name = getCurrentUserName();
    if (name !== "") {
        return true;
    } else {
        return false;
    }

}


