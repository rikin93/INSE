var pageLoaded;

function hashCode(string) {
    var hash = 0;
    if (string.length == 0)
        return hash;
    for (var i = 0; i < string.length; i++) {
        var character = string.charCodeAt(i);
        hash = ((hash << 5) - hash) + character;
        hash = hash & hash; // Convert to 32bit integer
    }
    return hash;
}
pageLoaded = function() {

    // declare the two variables that will be used
    var xhr, target, changeListener;

    // find the element that should be updated
    target = document.getElementById("mainBody");

    // create a request object
    xhr = new XMLHttpRequest();

    changeListener = function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // add the retrieved content to it using
            // the innerHTML property
            target.innerHTML = xhr.responseText;
        } else {
            target.innerHTML = "<p>Something went wrong.</p>";
        }
    };

    // initialise a request, specifying the HTTP method
    // to be used and the URL to be connected to.
    xhr.open("GET", "./api/get_projects.php?project_owner=" + hashCode(getCurrentUserName()), true);
    xhr.onreadystatechange = changeListener;
    xhr.send();

};

window.onload = pageLoaded;

function addProject() {
    // declare the two variables that will be used
    if (document.getElementById("projectname").value != "") {
        var xhr, target, changeListener;

        // find the element that should be updated
        target = document.getElementById("mainBody");

        // create a request object
        xhr = new XMLHttpRequest();

        changeListener = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                // add the retrieved content to it using
                // the innerHTML property
                target.innerHTML = xhr.responseText;
            } else {
                target.innerHTML = "<p>Something went wrong.</p>";
            }
        };

        // initialise a request, specifying the HTTP method
        // to be used and the URL to be connected to.
        xhr.open("GET", "./api/add_project.php?project_owner=" + hashCode(getCurrentUserName()) + "&project_name=" + document.getElementById("projectname").value, true);
        xhr.onreadystatechange = changeListener;
        xhr.send();
    } else {
        alert("Project name field can't be empty");
    }
}