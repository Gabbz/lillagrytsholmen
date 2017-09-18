<?php
session_start();
?>

<!DOCTYPE HTML>

<?php

include 'assets/includes/admin.inc.php';
include 'assets/includes/login.inc.php';
include 'assets/includes/register.php';
include 'assets/includes/settings.inc.php';

?>

<!--
	Dimension by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Lilla Grytholmen</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />

		<!-- CSS -->
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<link href="assets/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
		<link rel="stylesheet" href="assets/css/main.css" />

		<link rel="stylesheet" href="assets/css/pignose.calendar.css" />
		<link rel="stylesheet" href="assets/css/calendar-style.css" />

		<!-- JS -->
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/pignose.calendar.min.js"></script>

		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<noscript><link rel="stylesheet" href="assets/css/noscript.css" /></noscript>

		
		

	</head>
	<body>

		<!-- Wrapper -->
			<div id="wrapper">

			<div id="snackbar"><?php echo $feedback; ?></div>

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
										<li><a href="https://www.facebook.com/Kustkrokarna/" target="_blank" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									</ul>
								</p>
							</div>
						</div>
						<nav>
							<form style="margin: 0;" method="post">
								<ul>
									<?php 
										if (isset($_SESSION['username'])) {
											echo "<li><a href='assets/includes/logout.inc.php'>Logga ut</a></li>";
										} else {
											echo "<li><a href='#login'>Logga in</a></li>";
										} 
									?>
									<li><a href="#docs">Styrelsedokument</a></li>
									<li><a href="#photos">Fotoalbum</a></li>
									<li><a href="#book">Boka Stugan</a></li>
									<!--<li><a href="#elements">Elements</a></li>-->
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
												echo "<li><input type='submit' id='logout_submit' name='logout_submit' value='Logout' /></li>";	
											} else {
												echo "<li><input type='submit' id='admin_submit' name='admin_submit' value='Login' /></li>";
											} 
										?>
									</ul>
								</form>
							</article>

						<!-- login -->
							<article id="login">
								<h2 class="major">login</h2>
								<form name="login_form" id="login_form" method="post" <?php if (isset($_SESSION['username'])) {echo "action='assets/includes/logout.inc.php'";}else {echo "action='#'";} ?> >
									<label>Username</label>
									<input type="text" name="username_login" id="username_login" 
										value="<?php print $username;?>" placeholder="Enter your username" />
									
									<label for="password_login">Password</label>
									<input type="password" name="password_login" id="password_login" 
										value="<?php print $password;?>" placeholder="Enter your password" />
									
									<ul class="actions">
										<?php 
											if (isset($_SESSION['username'])) {
												echo "<li><input type='submit' id='logout_submit' name='logout_submit' value='Logout' /></li>";	
											} else {
												echo "<li><input type='submit' id='login_submit' name='login_submit' value='Login' /></li>";
											} 
										?>
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
								<form name="settings_form" id="settings_form" style="margin: 0;" method="post" action="#">
									<table style="margin: 0;">
										<tr style="background-color: inherit; border: inherit;">
											<td>
												<label>Anändarnamn</label>
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
													value="" placeholder="Ange nytt lösenord" />
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
													<li><input type="submit" id="settings_submit" name="settings_submit" value="Verkställ" /></li>
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
									<form method="post" action="#">
										<div style="width: 40%;float: left;margin-top: 27px;">
											<div class="calendar">
												<script type="text/javascript">
													$(function() {

														function onClickHandler(date, obj) {
															/**
															* @date is an array which be included dates(clicked date at first index)
															* @obj is an object which stored calendar interal data.
															* @obj.calendar is an element reference.
															* @obj.storage.activeDates is all toggled data, If you use toggle type calendar.
															* @obj.storage.events is all events associated to this date
															*/
															
															var text = '';

															if(date[0] !== null) {
																text += date[0].format('YYYY-MM-DD 12:01');
															}

															if(date[0] !== null && date[1] !== null) {
																text += ' - ';
															} else if(date[0] === null && date[1] == null) {
																text = '';
															}

															if(date[1] !== null) {
																text += date[1].format('YYYY-MM-DD 12:00');
															}

															document.getElementById("dates").value = text; 
														}
														
														var fillArray = [];

														$.get( "assets/includes/book.inc.php", function( data ) {
															response = JSON.parse(data);
															
															console.log(response);
															for (i=0; response.length > i; i++) {
															/*	var tempFiller = "";
																
																if (response[i].from_date_year != response[i].to_date_year) {
																	tempFiller = response[i].from_date_year +1;
																}
																if (response[i].from_date_year != response[i].from_date_year)
																while (response[i].from_date_month != response[i].to_date_year) {
																	if (response[i].from_date_year != response[i].from_date_year) {
																	}
																	if (response[i].from_date_year != response[i].from_date_year) {
																	}
																}*/
																fillArray.push({
																	name: response[i].renter.substr(0, response[i].renter.indexOf(' ') + '_' + response[i].renter.substr(response[i].renter.indexOf(' ')+1),
																	date: response[i].from_date_year + "-" + response[i].from_date_month + "-" + response[i].from_date_day
																});
																fillArray.push({
																	name: response[i].renter.substr(0, response[i].renter.indexOf(' ') + '_' + response[i].renter.substr(response[i].renter.indexOf(' ')+1),
																	date: response[i].to_date_year + "-" + response[i].to_date_month + "-" + response[i].to_date_day
																});
																
															}
															console.log(fillArray);

														});

														setTimeout(function(){$('.calendar').pignoseCalendar({
															theme: 'dark',
															lang: 'sv',
															week: 1,
															multiple: true,
															select: onClickHandler,
															scheduleOptions: {
																colors: {
																	test: '#2fabb7',
																	Jonas_Borg: '#5c6270',
																	meetup: '#ef8080'
																}
															},
															schedules: fillArray
															//Lägg till scheduler som dynamiskt hämtar vilka datum som är redan upptagna
														})}, 500);
													});
												</script>
											</div>
										</div>
										<div style="width: 60%;float: left;">
											<div  class="field">
												<label for ="dates">Valda datum:</label>
												<input type="text" placeholder="Välj datum i kalendern" id="dates" name="dates" readonly />
											</div>
											<div class="field">
												<label for="name">Boka för:</label>
												<input type="text" value="<?php print $_SESSION['fullname'];?>" name="name" id="name" readonly />
											</div>
											<div class="field">
												<label for="message">Övrig infromation</label>
												<textarea name="message" id="message" rows="4"></textarea>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Boka" class="special" /></li>
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
										<label for="name">Name</label>
										<input type="text" name="name" id="name" />
									</div>
									<div class="field half">
										<label for="email">Email</label>
										<input type="email" name="email" id="email" />
									</div>
									<div class="field">
										<label for="message">Message</label>
										<textarea name="message" id="message" rows="4"></textarea>
									</div>
									<ul class="actions">
										<li><input type="submit" value="Send Message" class="special" /></li>
										<li><input type="reset" value="Reset" /></li>
									</ul>
								</form>
								<ul class="icons">
									<li><a href="https://twitter.com/BorgJonas" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
									<li><a href="https://www.facebook.com/jonas.borg1337" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
									<li><a href="https://www.instagram.com/jonasborgs/" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
								</ul>
							</article>

						<!-- DEBUG -->

							<!-- Elements -->
								<article id="elements">
									<h2 class="major">Elements</h2>

									<section>
										<h3 class="major">Text</h3>
										<p>This is <b>bold</b> and this is <strong>strong</strong>. This is <i>italic</i> and this is <em>emphasized</em>.
										This is <sup>superscript</sup> text and this is <sub>subscript</sub> text.
										This is <u>underlined</u> and this is code: <code>for (;;) { ... }</code>. Finally, <a href="#">this is a link</a>.</p>
										<hr />
										<h2>Heading Level 2</h2>
										<h3>Heading Level 3</h3>
										<h4>Heading Level 4</h4>
										<h5>Heading Level 5</h5>
										<h6>Heading Level 6</h6>
										<hr />
										<h4>Blockquote</h4>
										<blockquote>Fringilla nisl. Donec accumsan interdum nisi, quis tincidunt felis sagittis eget tempus euismod. Vestibulum ante ipsum primis in faucibus vestibulum. Blandit adipiscing eu felis iaculis volutpat ac adipiscing accumsan faucibus. Vestibulum ante ipsum primis in faucibus lorem ipsum dolor sit amet nullam adipiscing eu felis.</blockquote>
										<h4>Preformatted</h4>
										<pre><code>i = 0;

										while (!deck.isInOrder()) {
											print 'Iteration ' + i;
											deck.shuffle();
											i++;
										}

										print 'It took ' + i + ' iterations to sort the deck.';</code></pre>
									</section>

									<section>
										<h3 class="major">Lists</h3>

										<h4>Unordered</h4>
										<ul>
											<li>Dolor pulvinar etiam.</li>
											<li>Sagittis adipiscing.</li>
											<li>Felis enim feugiat.</li>
										</ul>

										<h4>Alternate</h4>
										<ul class="alt">
											<li>Dolor pulvinar etiam.</li>
											<li>Sagittis adipiscing.</li>
											<li>Felis enim feugiat.</li>
										</ul>

										<h4>Ordered</h4>
										<ol>
											<li>Dolor pulvinar etiam.</li>
											<li>Etiam vel felis viverra.</li>
											<li>Felis enim feugiat.</li>
											<li>Dolor pulvinar etiam.</li>
											<li>Etiam vel felis lorem.</li>
											<li>Felis enim et feugiat.</li>
										</ol>
										<h4>Icons</h4>
										<ul class="icons">
											<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
											<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
											<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
											<li><a href="#" class="icon fa-github"><span class="label">Github</span></a></li>
										</ul>

										<h4>Actions</h4>
										<ul class="actions">
											<li><a href="#" class="button special">Default</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
										<ul class="actions vertical">
											<li><a href="#" class="button special">Default</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
									</section>

									<section>
										<h3 class="major">Table</h3>
										<h4>Default</h4>
										<div class="table-wrapper">
											<table>
												<thead>
													<tr>
														<th>Name</th>
														<th>Description</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Item One</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Two</td>
														<td>Vis ac commodo adipiscing arcu aliquet.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Three</td>
														<td> Morbi faucibus arcu accumsan lorem.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Four</td>
														<td>Vitae integer tempus condimentum.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Five</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
										</div>

										<h4>Alternate</h4>
										<div class="table-wrapper">
											<table class="alt">
												<thead>
													<tr>
														<th>Name</th>
														<th>Description</th>
														<th>Price</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>Item One</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Two</td>
														<td>Vis ac commodo adipiscing arcu aliquet.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Three</td>
														<td> Morbi faucibus arcu accumsan lorem.</td>
														<td>29.99</td>
													</tr>
													<tr>
														<td>Item Four</td>
														<td>Vitae integer tempus condimentum.</td>
														<td>19.99</td>
													</tr>
													<tr>
														<td>Item Five</td>
														<td>Ante turpis integer aliquet porttitor.</td>
														<td>29.99</td>
													</tr>
												</tbody>
												<tfoot>
													<tr>
														<td colspan="2"></td>
														<td>100.00</td>
													</tr>
												</tfoot>
											</table>
										</div>
									</section>

									<section>
										<h3 class="major">Buttons</h3>
										<ul class="actions">
											<li><a href="#" class="button special">Special</a></li>
											<li><a href="#" class="button">Default</a></li>
										</ul>
										<ul class="actions">
											<li><a href="#" class="button">Default</a></li>
											<li><a href="#" class="button small">Small</a></li>
										</ul>
										<ul class="actions">
											<li><a href="#" class="button special icon fa-download">Icon</a></li>
											<li><a href="#" class="button icon fa-download">Icon</a></li>
										</ul>
										<ul class="actions">
											<li><span class="button special disabled">Disabled</span></li>
											<li><span class="button disabled">Disabled</span></li>
										</ul>
									</section>

									<section>
										<h3 class="major">Form</h3>
										<form method="post" action="#">
											<div class="field half first">
												<label for="demo-name">Name</label>
												<input type="text" name="demo-name" id="demo-name" value="" placeholder="Jane Doe" />
											</div>
											<div class="field half">
												<label for="demo-email">Email</label>
												<input type="email" name="demo-email" id="demo-email" value="" placeholder="jane@untitled.tld" />
											</div>
											<div class="field">
												<label for="demo-category">Category</label>
												<div class="select-wrapper">
													<select name="demo-category" id="demo-category">
														<option value="">-</option>
														<option value="1">Manufacturing</option>
														<option value="1">Shipping</option>
														<option value="1">Administration</option>
														<option value="1">Human Resources</option>
													</select>
												</div>
											</div>
											<div class="field half first">
												<input type="radio" id="demo-priority-low" name="demo-priority" checked>
												<label for="demo-priority-low">Low</label>
											</div>
											<div class="field half">
												<input type="radio" id="demo-priority-high" name="demo-priority">
												<label for="demo-priority-high">High</label>
											</div>
											<div class="field half first">
												<input type="checkbox" id="demo-copy" name="demo-copy">
												<label for="demo-copy">Email me a copy</label>
											</div>
											<div class="field half">
												<input type="checkbox" id="demo-human" name="demo-human" checked>
												<label for="demo-human">Not a robot</label>
											</div>
											<div class="field">
												<label for="demo-message">Message</label>
												<textarea name="demo-message" id="demo-message" placeholder="Enter your message" rows="6"></textarea>
											</div>
											<ul class="actions">
												<li><input type="submit" value="Send Message" class="special" /></li>
												<li><input type="reset" value="Reset" /></li>
											</ul>
										</form>
									</section>

								</article>

					</div>

				<!-- Footer -->
					<footer id="footer">
						<p class="copyright">&copy; Jonas Borg - 2017 - Frågor? <a href="#contact">Kontakta mig!</a> <?php if (isset($_SESSION['username'])) echo "Inloggad: " . "<a href='#settings'>" . $_SESSION['username'] . "</a>"; ?></p>
					</footer>

			</div>

		<!-- BG -->
			<div id="bg"></div>

		<!-- Scripts -->
			
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>
			<script src="assets/js/snackbar.js"></script>
			<script src="assets/js/plugins/sortable.js" type="text/javascript"></script>
			<script src="assets/js/fileinput.js" type="text/javascript"></script>
			<script src="assets/js/locales/sv.js" type="text/javascript"></script>
			<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" type="text/javascript"></script>
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

			<?php if (isset($feedback)) {
				echo "<script>(function(){toggleSnackbar()})();</script>";
			} ?>

	</body>
</html>
