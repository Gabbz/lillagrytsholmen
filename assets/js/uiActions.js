function updateHeader(action, fullName) {
    //console.log($("#header").find('nav').find('form').find('ul').find('li').va);

    if (action == 'logout') {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<a href="#login">Logga in</a>';
        $("#settings_toggle").remove();
        $("#login").find(".actions")[0].innerHTML = "<li><input type='button' id='login_submit' name='login_submit' onclick='login();' value='Logga in' /></li>";

    } else if (action == 'login') {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<li><a onclick="logout();">Logga ut</a></li>';
        $("#footer").find('p').append('<p id="settings_toggle">Inloggad: <a href="#settings">' + fullName + '</a></p>');
        $("#login").find(".actions")[0].innerHTML = "<li><input type='submit' id='logout_submit' name='logout_submit' onclick='logout();' value='Logga ut'></li>";

    } else {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML =  '<li><a onclick="logout();">Logga ut</a></li>';
        $("#footer").find('p').append('<p id="settings_toggle">Inloggad: <a href="#settings">' + fullName + '</a></p>');
        $("#login").find(".actions")[0].innerHTML = "<li><input type='submit' id='logout_submit' name='logout_submit' onclick='logout();' value='Logga ut'></li>";

    }
}

function logout() {

    $.post("/lillagrytsholmen/assets/includes/logout.inc.php", {},
    function(data) {

        var parsed = JSON.parse(data);
        
        if (parsed.status == "0") {

            var username_login = "";
            var password_login = "";
            updateHeader('logout', '');
            triggerSnackbar(parsed.feedback);
        } else {
            triggerSnackbar("Något gick fel vid utloggningen.");
        }
    });
}

function login() {

    var username_login = $("#username_login").val();
    var password_login = $("#password_login").val();

    $.post("/lillagrytsholmen/assets/includes/login.inc.php", { 
        username_login: username_login, 
        password_login: password_login
    },
    function(data) {

        var parsed = JSON.parse(data);
        triggerSnackbar(parsed.feedback);
        if (data.status == "0")
            updateHeader('login', parsed.fullName);
    });

}

