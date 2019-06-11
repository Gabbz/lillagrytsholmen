function submitSettings() {
    var settings_username = $("#settings_username").val();
    var settings_password = $("#settings_password").val();
    var settings_password2 = $("#settings_password2").val();
    var settings_fullname = $("#settings_fullname").val();
    var settings_phone = $("#settings_phone").val();
    var settings_email = $("#settings_email").val();
    var settings_adress = $("#settings_adress").val();
    var settings_postal = $("#settings_postal").val();
    var settings_city = $("#settings_city").val();

    console.log('settings: ' + settings_email);

    $.post("/lillagrytsholmen/assets/includes/settings.inc.php", { 
        settings_username: settings_username, 
        settings_password: settings_password, 
        settings_password2: settings_password2,
        settings_fullname: settings_fullname,
        settings_phone: settings_phone, 
        settings_email: settings_email, 
        settings_adress: settings_adress, 
        settings_postal: settings_postal, 
        settings_city: settings_city, 
    },
    function(data) {
	 //$('#results').html(data);
	 //$('#myForm')[0].reset();
    });
}