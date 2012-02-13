<div class="container">
	<div class="row">
		<div class="span12">
			<h2>Media Manager</h2>
		</div>
	</div>
	<div class="row">
		<div class="span6">
			<h3>Add Image</h3>
			<?= form_open_multipart('admin/addimage') ?>
				<input type="file" name="userfile"/>
				<?= form_submit(array('class' => 'btn btn-primary'), 'Upload'); ?>
			<?= form_close(); ?>
			<hr />
			<?php $imageList = get_filenames('./images/');
				foreach(@$imageList as $image): ?>
				<p><?= $image; ?> | <?= anchor('admin/deleteimage/' . $image, 'Delete'); ?></p>
			<?php endforeach; ?>
		</div>
		<div class="span6">
			<h3>Add Other Media</h3>
			<?= form_open_multipart('admin/addmedia') ?>
				<input type="file" name="userfile"/>
				<?= form_submit(array('class' => 'btn btn-primary'), 'Upload'); ?>
			<?= form_close(); ?>
			<hr />
			<?php $mediaList = get_filenames('./media/');
				foreach(@$mediaList as $media): ?>
				<p><?= $media; ?> | <?= anchor('admin/deletemedia/' . $media, 'Delete'); ?></p>
			<?php endforeach; ?>
		</div>
	</div>
</div>