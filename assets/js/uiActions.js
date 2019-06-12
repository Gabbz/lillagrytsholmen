function updateHeader(action, fullName) {
    //console.log($("#header").find('nav').find('form').find('ul').find('li').va);

    if (action == 'logout')
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<a href="#login">Logga in</a>';
    else if (action == 'login') {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<li><a onclick="logout();">Logga ut</a></li>';
        $("#footer").find('p').append('"Inloggad: <a href="#settings">" + fullName + "</a>"');
        
    }
    else {
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML =  '<li><a onclick="logout();">Logga ut</a></li>';
        $("#footer").find('p').append('Inloggad: <a href="#settings">' + fullName + '</a>');
    }
}

function logout() {

    $.post("/lillagrytsholmen/assets/includes/logout.inc.php", {},
    function(data) {
        
        if (data == "Du är nu utloggad.") {
            updateHeader('logout', '');
            triggerSnackbar(data);
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
        console.log(parsed);
        console.log(typeof parsed.status);
        triggerSnackbar(parsed.feedback);
        //if (data.status == 0)
            updateHeader('login', parsed.fullName);
    });
}

