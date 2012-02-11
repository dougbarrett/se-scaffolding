<div class="container">
	<div class="row">
		<div class="span12">
			<h2>Admin Home</h2>
			<hr />
		</div>
		<div class="span6">
			<h3>Page List | <a href="/admin/addpage">Add Page</a></h3>
				<table class="table table-striped table-bordered table-condensed">
					<tr><th>Title</th>
						<th>URL</th>
						<th>&nbsp;</th>
					</tr>
				<?php foreach($pageList as $url=>$title): ?>
					<tr>
						<td><?= anchor('admin/editpage/' . $url, $title); ?></td>
						<td><?= $url; ?></td>
						<td><?= anchor('admin/deletepage/' . $url, 'Delete'); ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
		<div class="span6">
			<h3>Template List | <a href="/admin/addpage">Add Page</a></h3>
				<table class="table table-striped table-bordered table-condensed">
					<tr><th>Title</th>
						<th>&nbsp;</th>
					</tr>
				<?php foreach($templateList as $hash=>$title): ?>
					<tr>
						<td><?= anchor('admin/edittemplate/' . $hash, $title); ?></td>
						<td><?= anchor('admin/deletetemplate/' . $hash, 'Delete'); ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
			<hr />
			<h3>CSS List | <a href="/admin/addcss">Add CSS</a></h3>
				<table class="table table-striped table-bordered table-condensed">
					<tr><th>Name</th>
						<th>&nbsp;</th>
					</tr>
				<?php foreach($cssList as $name): ?>
					<?php $name = str_replace(".less", "", $name); ?>
					<tr>
						<td><?= anchor('admin/editcss/' . $name, $name); ?></td>
						<td><?= anchor('admin/deletecss/' . $name, 'Delete'); ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
	</div>
</div>

