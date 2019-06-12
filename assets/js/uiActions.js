function updateHeader(action) {
    //console.log($("#header").find('nav').find('form').find('ul').find('li').va);

    if (action == 'logout')
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<a href="#login">Logga in</a>';
    else if (action == 'login')
        $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML = '<li><a href="assets/includes/logout.inc.php">Logga ut</a></li>';
    else $("#header").find('nav').find('form').find('ul').find('li')[0].innerHTML =  '<li><a href="assets/includes/logout.inc.php">Logga ut</a></li>';
}

