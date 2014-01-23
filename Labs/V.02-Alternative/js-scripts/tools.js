// @description
// miscelanous javascript functions 
// 
// @history 
// 23.1.2014   document created
// 



/**
 * Utility function to show or hide elements by their IDs.
 * @param {element} id element which will be shown or hidden
 */
function toggleElement(id) {
    var el = document.getElementById(id);
    if (el.getAttribute('class') == 'hide') {
        el.setAttribute('class', 'show');
    } else {
        el.setAttribute('class', 'hide');
    }
}

