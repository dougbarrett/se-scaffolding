<div class="container">
	<div class="row">
			<?= form_open(); ?>
			<div class="span12">
							<h2>Edit Template</h2>
			</div>
		<div class="span3">
				<div class="control-group">
					<label>Template Title</label>
					<div class="controls">
						<?= form_input('templateTitle', $title); ?>
					</div>
				</div>
		</div>
		<div class="span12">
				<div class="control-group">
					<label>Template HTML</label>
					<div class="controls">
						<?= form_textarea(array('name' => 'templateBody', 'id' => 'code'), $body); ?>
					</div>
				</div>
				<div class="form-actions">
					<?= form_submit(array('class' => 'btn btn-primary'), 'Save'); ?>
				</div>
		</div>
			<?= form_close(); ?>
	</div>
</div>

