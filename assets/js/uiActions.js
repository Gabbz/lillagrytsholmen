function updateHeader(action) {
    //console.log($("#header").find('nav').find('form').find('ul').find('li').va);

    if (action == 'logout')
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<a href="#login">Logga in</a>';
    else if (action == 'login')
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<li><a onclick="logout();">Logga ut</a></li>';
    else $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML =  '<li><a onclick="logout();">Logga ut</a></li>';
}

function logout() {

    $.post("/lillagrytsholmen/assets/includes/logout.inc.php", {},
    function(data) {
        
        if (data == "Du är nu utloggad.") {
            updateHeader('login');
            triggerSnackbar(data);
        } else {
            triggerSnackbar("Något gick fel vid utloggningen.");
        }
    });
}

