function checkLoginStatus(sessionUserName, sessionName) {
    
    console.log("Checkar loginstatus för: " + sessionUserName);

    if (sessionUserName == 'no_session') updateHeader('logout', '', true);
    else updateHeader('login', {fullName : sessionName}, true);
    
}

function updateHeader(action, sessionData, firstLoad) {
    //console.log($("#header").find('nav').find('form').find('ul').find('li').va);

    console.log('uppdaterar header med action: ' + action);

    if (action == 'logout') {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<a href="#login">Logga in</a>';
        $("#settings_toggle").remove();
        $("#login").find(".actions")[0].innerHTML = "<li><input type='button' id='login_submit' name='login_submit' onclick='login();' value='Logga in' /></li>";

    } else if (action == 'login') {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<li><a onclick="logout();" href>Logga ut</a></li>';
        $("#footer").find('p').append('<p id="settings_toggle">Inloggad: <a href="#settings">' + sessionData.fullName + '</a></p>');
        $("#login").find(".actions")[0].innerHTML = "<li><input type='submit' id='logout_submit' name='logout_submit' onclick='logout();' value='Logga ut'></li>";

        if (!firstLoad) {
            $("#settings_username").attr('value', sessionData.userName);
            $("#settings_fullname").attr('value', sessionData.fullName);
            $("#settings_adress").attr('value', sessionData.adress);
            $("#settings_postal").attr('value', sessionData.postal);
            $("#settings_city").attr('value', sessionData.city);
            $("#settings_phone").attr('value', sessionData.phone);
            $("#settings_email").attr('value', sessionData.email);
        }

    } else {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML =  '<li><a onclick="logout();" href>Logga ut</a></li>';
        $("#footer").find('p').append('<p id="settings_toggle">Inloggad: <a href="#settings">' + sessionData.fullName + '</a></p>');
        $("#login").find(".actions")[0].innerHTML = "<li><input type='submit' id='logout_submit' name='logout_submit' onclick='logout();' value='Logga ut'></li>";

        if (!firstLoad) {
            $("#settings_username").attr('value', sessionData.userName);
            $("#settings_fullname").attr('value', sessionData.fullName);
            $("#settings_adress").attr('value', sessionData.adress);
            $("#settings_postal").attr('value', sessionData.postal);
            $("#settings_city").attr('value', sessionData.city);
            $("#settings_phone").attr('value', sessionData.phone);
            $("#settings_email").attr('value', sessionData.email);
        }

    }
}

function logout() {

    $.post("/lillagrytsholmen/assets/includes/logout.inc.php", {},
    function(data) {

        var parsed = JSON.parse(data);
        
        if (parsed.status == "0") {

            var username_login = "";
            var password_login = "";
            updateHeader('logout', '', false);
            triggerSnackbar(parsed.feedback);
            window.location.replace('http://ts.jonasborg.eu/lillagrytsholmen');
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
        console.log('Loggar in ' + parsed.fullName + ' status: ' + parsed.status)
        if (parsed.status == "0") {
            updateHeader('login', parsed, false);
            window.location.replace('http://ts.jonasborg.eu/lillagrytsholmen/#');
        }
    });

}

//checkLoginStatus(loginStatus, sessionName);