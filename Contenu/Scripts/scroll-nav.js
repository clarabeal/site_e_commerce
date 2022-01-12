window.onscroll = function() {navScroll()};
 
function navScroll() {
    var x = document.body.scrollTop || document.documentElement.scrollTop;
        if (x > 1){
          document.getElementById("menu").style.opacity = "0.2";
          document.getElementById("menu").style.transition = "opacity 0.2s";
        } else {
        document.getElementById("menu").style.opacity = "1";
    }   
}