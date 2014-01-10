// @description
// callback function after authentification is done
// 
// @history 
// 6.1.2014   document created
// 10.1.2014 library has been made from this document
// function related to connected user are stored here

// callback function - here can be set what will happen after user is logged in


var helper = (function() {
    var BASE_API_PATH = 'plus/v1/';

    return {
        isSignedIn: function() {
            sessionParams = {
                'client_id': '156807246102-njiq7taooltr8u5t1jc6atj716pfeh18.apps.googleusercontent.com',
                'session_state': null
            };
            gapi.auth.checkSessionState(sessionParams, function(stateMatched) {
                if (stateMatched === true) {
                    return false;
                } else {
                    return true;
                }
            });
        },
        /**
         * Hides the sign in button and starts the post-authorization operations.
         *
         * @param {Object} authResult An Object which contains the access token and
         *   other authentication information.
         */
        onSignInCallback: function(authResult) {
            gapi.client.load('plus', 'v1', function() {
                if (authResult['access_token']) {

                    console.log("Connected");
                } else if (authResult['error']) {
                    // There was an error, which means the user is not signed in.
                    // As an example, you can handle by writing to the console:
                    console.log('There was an error: ' + authResult['error']);
                }
                console.log('authResult', authResult);
            });
        },
        /**
         * Calls the OAuth2 endpoint to disconnect the app for the user.
         */
        disconnect: function() {
            // Revoke the access token.
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
        },
        /**
         * Gets the currently signed in user's profile data.
         */
        profile: function() {
            var request = gapi.client.plus.people.get({'userId': 'me'});
            request.execute(function(profile) {

                if (profile.error) {
                    return;
                }
            });
        }
    };
})();

/**
 * Calls the helper method that handles the authentication flow.
 *
 * @param {Object} authResult An Object which contains the access token and
 *   other authentication information.
 */
function onSignInCallback(authResult) {
    helper.onSignInCallback(authResult);
}

function disconnect() {
    helper.disconnect();
}
/**
 * Returns profile of currently logged user
 */
function getProfile() {
    helper.profile();
}

function isSignedIn() {
    return helper.isSignedIn();

}