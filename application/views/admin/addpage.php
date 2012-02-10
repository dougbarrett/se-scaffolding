<div class="container">
	<div class="row">
			<?= form_open(); ?>
			<div class="span12">
							<h2>Add Page</h2>
			</div>
		<div class="span3">
				<div class="control-group">
					<label>Page Title</label>
					<div class="controls">
						<?= form_input('pageTitle'); ?>
					</div>
				</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label>Page URL</label>
				<div class="controls">
					<?= form_input('pageURL'); ?>
				</div>
			</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label>Template</label>
				<div class="controls">
					<?php
					$options = array();
					foreach($templateList as $hash=>$title)
						$options[$hash] = $title;

					echo form_dropdown('pageTemplate', $options);
					?>
				</div>
			</div>
		</div>
		<div class="span3">&nbsp;</div>
		<div class="span12">
				<div class="control-group">
					<label>Page Body</label>
					<div class="controls">
						<?= form_textarea(array('name' => 'pageBody', 'id' => 'code')); ?>
					</div>
				</div>
				<div class="form-actions">
					<?= form_submit(array('class' => 'btn btn-primary'), 'Save'); ?>
				</div>
		</div>
			<?= form_close(); ?>
	</div>
</div>