<?php
session_start();
$session_username = (isset($_SESSION['username'])) ? $_SESSION['username'] : 'no_session'; 
$session_fullname = (isset($_SESSION['fullname'])) ? $_SESSION['username'] : 'no_name'; 
$session_logged_out = (isset($_SESSION['logged_out'])) ? $_SESSION['logged_out'] : 'false'; 

?>

<!DOCTYPE HTML>

<?php

include 'assets/debug/toConsole.php';
include 'assets/includes/admin.inc.php';
include 'assets/includes/register.php';
include 'assets/includes/book_cabin.inc.php';

?>

<html>
	<head>
		<title>Lilla Grytholmen</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
		<link rel="icon" href="images/favicon.ico" type="image/x-icon">

		<!-- CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="stylesheet" href="assets/css/pignose.calendar.css" />
		<link rel="stylesheet" href="assets/css/calendar-style.css" />

		<!-- JS -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/pignose.calendar.min.js"></script>
		<script src="assets/js/submit.js"></script>
		<script src="assets/js/uiActions.js"></script>
		

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		
		

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

			<!--<div id="snackbar"><?php echo $feedback; ?></div>-->
			<div id="snackbar"></div>

				<?php include 'assets/includes/db_connect.inc.php'; ?>

				<!-- Header -->
					<header id="header">
						<div class="logo">
							<span class="icon fa-github"></span>
						</div>
						<div class="content">
							<div class="inner">
								<h1>Lilla Grytsholmen</h1>
								<p>Ett paradis <a href="https://www.google.se/maps/place/Krusenhov+Lilla+Grytsholmen+6,+616+90+%C3%85by/@58.631264,16.245232,13z/data=!4m5!3m4!1s0x465930741ff80d99:0x2ee6ed98cac42bca!8m2!3d58.6293777!4d16.2734717" target="_blank">
								beläget längst in i bråviken</a>, strax utanför lindö småbåtshamn, Norrköping</p>
								<p>
									<!-- MAKE PRETTIER -->
									<ul class="icons" style="margin:0px;">
										<li><a href="https://www.facebook.com/groups/317297899006745/" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									</ul>
								</p>
							</div>
						</div>
						<nav>
							<form style="margin: 0;" method="post">
								<ul>
									<li><a href='#login'>Logga in</a></li>
									<li><a href="#book">Boka Stugan</a></li>
								</ul>
							</form>
						</nav>
					</header>

				<!-- Main -->
					<div id="main">

						<!-- admin_login -->
							<article id="admin">
								<h2 class="major">admin login</h2>
								<form name="admin_form" id="admin_form" method="post" action="#">
									<label for="admin_login">Username</label>
									<input type="text" name="admin_username" id="admin_username" 
										value="<?php print $admin_username;?>" placeholder="Enter admin username" />
									
									<label for="admin_password">Password</label>
									<input type="password" name="admin_password" id="admin_password" 
										value="<?php print $admin_password;?>" placeholder="Enter admin password" />
									
									<ul class="actions">
										<?php 
											if (isset($_SESSION['username'])) {
												echo "<li><input type='submit' id='admin_logout' name='admin_logout' value='Logout' /></li>";	
											} else {
												echo "<li><input type='submit' id='admin_submit' name='admin_submit' value='Login' /></li>";
											} 
										?>
									</ul>
								</form>
							</article>

						<!-- login -->
							<article id="login">
								<h2 class="major">Logga in</h2>
								<form name="login_form" id="login_form" method="post">
									<label>Användarnamn</label>
									<input type="text" name="username_login" id="username_login" 
										value="<?php print $username;?>" placeholder="Enter your username" />
									
									<label for="password_login">Lösenord</label>
									<input type="password" name="password_login" id="password_login" 
										value="<?php print $password;?>" placeholder="Enter your password" />
									
									<ul class="actions">
										
										<li><input type='button' id='login_submit' name='login_submit' onclick='login();' value='Logga in' /></li>
									</ul>
								</form>
							</article>

						<!-- register --> 
							<article id="register">
								<h2 class="major">Register</h2>
								<form name="register_form" id="register_form" style="margin: 0;" method="post" action="#">
									<table>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Username</label>
												<input type="text" name="register_username" id="register_username" 
													value="<?php print $register_username;?>" placeholder="Enter username" />
											</td>
											<td>
												<label>E-mail</label>
												<input type="email" name="register_email" id="register_email" 
													value="<?php print $register_email;?>" placeholder="Enter email" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Password</label>
												<input type="password" name="register_password" id="register_password" 
													value="<?php print $register_password;?>" placeholder="Enter password" />
											</td>
											<td>
												<label>Adress</label>
												<input type="text" name="register_adress" id="register_adress" 
													value="<?php print $register_adress;?>" placeholder="Enter adress" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;"> 
											<td>
												<label>Fullständigt namn</label>
												<input type="text" name="register_fullname" id="register_fullname" 
													value="<?php print $register_fullname;?>" placeholder="Enter fullname" />
											</td>
											<td>
												<label>Postnummer</label>
												<input type="text" name="register_postal" id="register_postal" 
													value="<?php print $register_postal;?>" placeholder="Enter postal" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Mobilnummer</label>
												<input type="text" name="register_phone" id="register_phone" 
													value="<?php print $register_phone;?>" placeholder="Enter phone" />
											</td>
											<td>
												<label>Stad</label>
												<input type="text" name="register_city" id="register_city" 
													value="<?php print $register_city;?>" placeholder="Enter city" />
											</td>
										</tr>
									</table>
									<ul class="actions" style="padding-left: 0.75rem">
										<li><input type="submit" id="register_submit" name="register_submit" value="Register" /></li>
									</ul>
								</form>
							</article>

						<!-- personal settings --> 
							<article id="settings">
								<h2 class="major">Personliga inställningar</h2>
								<form name="settings_form" id="settings_form" style="margin: 0;" method="post" action="#" autocomplete="off">
									<table style="margin: 0;">
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Anändarnamn</label>
												<!-- fake fields are a workaround for chrome autofill getting the wrong fields -->
												<input class="fake-autofill-fields" style="display:none" type="text" name="fakeusernameremembered"/>
												<input type="text" name="settings_username" id="settings_username" 
													value="<?php print $_SESSION['username'];?>" placeholder="Ange det nya användarnamnet" />
											</td>
											<td>
												<label>Fullständigt namn</label>
												<input type="text" name="settings_fullname" id="settings_fullname" 
													value="<?php print $_SESSION['fullname'];?>" placeholder="Ange ditt namn" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Nytt lösenord</label>
												<input type="password" name="settings_password" id="settings_password" 
													value="" placeholder="Ange nytt lösenord" 
													autocomplete="new-password"/>
											</td>
											<td>
												<label>Konfirmera det nya lösenordet</label>
												<input type="password" name="settings_password2" id="settings_password2" 
													value="" placeholder="Ange det nya lösenordet igen" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;"> 
											<td>
												<label>Adress</label>
												<input type="text" name="settings_adress" id="settings_adress" 
													value="<?php print $_SESSION['adress'];?>" placeholder="Ange adress" />
											</td>
											<td>
												<label>Postnummer</label>
												<input type="text" name="settings_postal" id="settings_postal" 
													value="<?php print $_SESSION['postal'];?>" placeholder="Ange postnummer" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Stad</label>
												<input type="text" name="settings_city" id="settings_city" 
													value="<?php print $_SESSION['city'];?>" placeholder="Ange stad" />
											</td>
											<td>
												<label>E-mail</label>
												<input type="email" name="settings_email" id="settings_email" 
													value="<?php print $_SESSION['email'];?>" placeholder="Ange E-mail" />
											</td>
										</tr>
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Mobilnummer</label>
												<input type="text" name="settings_phone" id="settings_phone" 
													value="<?php print $_SESSION['phone'];?>" placeholder="Ange telefonnummer" />
											</td>
											<td>
												<label style="opacity: 0;">spacer</label>
												<ul class="actions" style="float: right; margin: 0;">
													<li><input type="button" id="settings_submit" name="settings_submit" onclick="submitSettings();" value="Verkställ" /></li>
												</ul>
											</td>
										</tr>
									</table>
								</form>
							</article>

						<!-- docs -->
							<article id="docs">
								<h2 class="major">Styrelsedokument</h2>
								<span class="image main"><img src="images/pic02.jpg" alt="" /></span>
								<p>Adipiscing magna sed dolor elit. Praesent eleifend dignissim arcu, at eleifend sapien imperdiet ac. Aliquam erat volutpat. Praesent urna nisi, fringila lorem et vehicula lacinia quam. Integer sollicitudin mauris nec lorem luctus ultrices.</p>
								<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
								<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
								<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
								<p>Nullam et orci eu lorem consequat tincidunt vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus pharetra. Pellentesque condimentum sem. In efficitur ligula tate urna. Maecenas laoreet massa vel lacinia pellentesque lorem ipsum dolor. Nullam et orci eu lorem consequat tincidunt. Vivamus et sagittis libero. Mauris aliquet magna magna sed nunc rhoncus amet feugiat tempus.</p>
								
							</article>

						<!-- photos -->
							<article id="photos">
								<h2 class="major">Fotoalbum</h2>
								<div>
									<a href="#upload">
										<div class="module mid">
											<h2>Ladda upp bilder</h2>
										</div>
									</a>
									<a href=#gallery>
										<div class="module2 mid">
											<h2>Till fotogalleriet</h2>
										</div>
									</a>
								</div>
								</table>
							</article>

						<!-- upload -->
							<article id="upload" style="width:90%;">
								<h2 class="major">Ladda upp bilder</h2>
								<form enctype="multipart/form-data" style="margin: 2rem 0 2rem 0;">
									<input id="files" name="files[]" type="file" multiple>
								</form>
								
								<!-- <form action="upload.php" method="post" enctype="multipart/form-data">
									<ul class="actions" style="padding-left: 0.75rem">
										<li><input type="submit" value="Ladda upp bilder" name="submit" /></li>
									</ul>
								</form> -->
							</article>

						<!-- photo gallery -->
							<article id="gallery">
							</article>


						<!-- book -->
							<article id="book" style="width:100%;">
								<h2 class="major">Boka Stugan</h2>
								<div style="width:1380px;">
									<div style="width: 40%;float: left;margin-top: 27px;">
										<div class="calendar">
											<script type="text/javascript" src="/lillagrytsholmen/assets/js/calendar.js"></script>
										</div>
									</div>
									<form method="post" action="#book">
										<div style="width: 60%;float: left;">
											<div  class="field">
												<label for ="dates">Valda datum:</label>
												<input type="text" placeholder="Välj datum i kalendern" id="dates" name="book_dates" readonly />
											</div>
											<div class="field">
												<label for="name">Boka för:</label>
												<input type="text" value="<?php print $_SESSION['fullname'];?>" name="book_name" id="book_name" readonly />
											</div>
											<div class="field">
												<label for="message">Övrig infromation</label>
												<textarea name="book_message" id="book_message" rows="4"></textarea>
											</div>
											<ul class="actions">
												<li><input type="submit" id="book_submit" name="book_submit" value="Boka" class="special" /></li>
											</ul>
										</div>
									</form>
								</div>
							</article>

						<!-- contact -->
							<article id="contact">
								<h2 class="major">Kontakta administratör</h2>
								<form method="post" action="#">
									<div class="field half first">
										<label for="name">Namn</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Meddelande</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Skicka meddelande" class="special" /></li>
										<li><input type="reset" value="Återställ formulär" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="https://twitter.com/BorgJonas" target="_blank" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/jonas.borg1337" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/jonasborgs/" target="_blank" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Jonas Borg - 2019 - Frågor? <a href="#contact">Kontakta mig!</a></p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/plugins/sortable.js" type="text/javascript"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
			<script src="assets/js/fileinput.js" type="text/javascript"></script>
			<script src="assets/js/locales/sv.js" type="text/javascript"></script>
			<script>
				$('#files').fileinput({
					language: 'sv',
					uploadUrl: 'assets/includes/upload.inc.php',
					allowedFileExtensions: ['jpg', 'png', 'gif'],
					browseLabel: "Välj filer",
					maxFileSize: 5000,
					maxFileNum: 5,
					maxFileCount: 5 
					/* Ev tagga uploaden
					uploadExtraData: function() {
						return {
							userid: $("#userid").val(),
							username: $("#username").val()
						};
					} */
				});
			</script>

			<script src="assets/js/snackbar.js" type="text/javascript"></script>

			<script type="text/javascript">
				var sessionUserName = <?php echo json_encode($session_username); ?>;
				var sessionName = <?php echo json_encode($session_fullname); ?>;
				checkLoginStatus(sessionUserName, sessionName);

				var isLoggedOut = <?php echo json_encode($session_logged_out); ?>;

				console.log("logout status: " + isLoggedOut);

				if (sessionUserName == "no_session" && isLoggedOut == "true") {
					triggerSnackbar("Du är nu utloggad.");
					<?php $_SESSION["logged_out"] = "false"; ?>
				}
			</script>

			

	</body>
</html>
