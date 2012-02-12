<div class="container">
	<div class="row">
		<div class="span12">
			<h2>Settings</h2>
		<h4>Change username/password</h4>
		<p>You MUST enter in a username and password, leaving it blank will result in a blank usernamd and/or password, which is <strong>very</strong> unsecure.</strong></p>
		<?= form_open(); ?>
		<div class="control-group">
			<label>Username</label>
			<div class="controls">
				<?= form_input('username'); ?>
			</div>
		</div>
		<div class="control-group">
			<label>Password</label>
			<div class="controls">
				<?= form_password('password'); ?>
			</div>
		</div>
		<div class="form-actions">
			<?= form_submit(array('class' => 'btn btn-primary'), 'Save'); ?>
		</div>
		<?= form_close(); ?>
		</div>
	</div>
</div>