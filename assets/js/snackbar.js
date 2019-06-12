function toggleSnackbar() {
    



    setTimeout(function(){

        var x = document.getElementById("snackbar")
        x.className = "show";
        setTimeout(function(){ x.className = x.className.replace("show", ""); }, 6000);
    }, 1000)
}

function triggerSnackbar() {
    console.log("trigger triggad");
    (function(){toggleSnackbar()})();
}