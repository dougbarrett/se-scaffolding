<!DOCTYPE HTML>
<html lang="en-US">
<head>
	<meta charset="UTF-8">
	<title></title>
	<style type="text/css" media="screen">
		html, body {
		  margin:0;
		  padding:0;
		  font-family:"Palatino Linotype", "Book Antiqua", Palatino, serif;
		}
		body {
		  background-color:#dddddd;
		  color:#333333;
		}
		a { color:#111111; }
		.container {
		  width:960px;
		  margin:0 auto;
		  padding:10px;
		  background-color:#ffffff;
		  color:#333333;
		}
		input, label {
			display:block;
		}
		.about {
			float:left;
			width:730px;
			padding-right:30px;
		}
		.setup {
			float:left;
		}
		.clear {
			clear:both;
			height:0;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>SES Login</h1>
		<?php if($loggedin == FALSE): ?>
			<h4>Login failed, try again</h4>
		<?php endif; ?>
			<div class="setup">
				<?= form_open(); ?>
				<label>Username</label>
				<?= form_input('username'); ?>
				<label>Password</label>
				<?= form_password('password'); ?>
				<?= form_submit(null, 'Setup'); ?>
			<?= form_close(); ?>
			</div>
			<div class="clear">&nbsp;</div>
	</div>
</body>
</html>