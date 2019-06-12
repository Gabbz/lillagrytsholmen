function toggleSnackbar(feedback) {

    setTimeout(function(){

        var x = document.getElementById("snackbar")
        x.className = "show";
        x.innerHTML = "<p>" + feedback + "</p>";
        setTimeout(function(){ 
            x.className = x.className.replace("show", ""); 
        }, 6000);
    }, 1000)
}

function triggerSnackbar(feedback) {

    console.log("trigger triggad");
    (function(){toggleSnackbar(feedback)})();
}