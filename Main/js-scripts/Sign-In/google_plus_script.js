// @description
// this script is used to enable google+ sing in abilities
// does not need any change !!
// 
// @history 
// 6.1.2014   document created
// 
(function() {
    var po = document.createElement('script');
    po.type = 'text/javascript';
    po.async = true;
    po.src = 'https://plus.google.com/js/client:plusone.js';
    var s = document.getElementsByTagName('script')[0];
    s.parentNode.insertBefore(po, s);
})();
