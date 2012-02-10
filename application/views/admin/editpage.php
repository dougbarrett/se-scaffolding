<div class="container">
	<div class="row">
			<?= form_open(); ?>
			<div class="span12">
							<h2>Edit Page</h2>
			</div>
		<div class="span3">
				<div class="control-group">
					<label>Page Title</label>
					<div class="controls">
						<?= form_input('pageTitle', $title); ?>
					</div>
				</div>
		</div>
		<div class="span3">
			<div class="control-group">
				<label>Page URL</label>
				<div class="controls">
					<?= form_input('pageURL', $pageURL); ?>
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

					echo form_dropdown('pageTemplate', $options, @$pageTemplate);
					?>
				</div>
			</div>
		</div>
		<div class="span3">&nbsp;</div>
		<div class="span12">
				<div class="control-group">
					<label>Page Body</label>
					<div class="controls">
						<?= form_textarea(array('name' => 'pageBody', 'id' => 'code'), $pageBody); ?>
					</div>
				</div>
				<div class="form-actions">
					<?= form_submit(array('class' => 'btn btn-primary'), 'Save'); ?>
				</div>
		</div>
			<?= form_close(); ?>
	</div>
</div>