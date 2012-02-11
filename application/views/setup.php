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
		<h1>SES Setup</h1>
			<div class="about">
				<h2>Setup is extremely easy</h2>
				<p><strong>WRITE DOWN YOUR PASSWORD</strong>.  As of right now, there is no password recovery system.</p>
				<p>Just type in a username and password, and you are good to go!</p>
			</div>
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