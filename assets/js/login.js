function login() {
    
    var username_login = $("#username_login").val();
    var password_login = $("#password_login").val();

    $.post("/lillagrytsholmen/assets/includes/login.inc.php", { 
        username_login: username_login, 
        password_login: password_login
    },
    function(data) {
        
        triggerSnackbar(data);
    });
}