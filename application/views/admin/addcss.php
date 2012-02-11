<div class="container">
	<div class="row">
			<?= form_open(); ?>
			<div class="span12">
							<h2>Add CSS</h2>
			</div>
		<div class="span3">
				<div class="control-group">
					<label>CSS Name</label>
					<div class="controls">
						<?= form_input('cssName'); ?>
					</div>
				</div>
		</div>
		<div class="span12">
				<div class="control-group">
					<label>CSS</label>
					<div class="controls">
						<?= form_textarea(array('name' => 'css', 'id' => 'code')); ?>
					</div>
				</div>
				<div class="form-actions">
					<?= form_submit(array('class' => 'btn btn-primary'), 'Save'); ?>
				</div>
		</div>
			<?= form_close(); ?>
	</div>
</div>