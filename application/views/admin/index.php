<div class="container">
	<div class="row">
		<div class="span12">
			<h2>Admin Home</h2>
			<hr />
		</div>
		<div class="span6">
			<h3>Page List</h3>
				<table class="table table-striped table-bordered table-condensed">
					<tr><th>Title</th>
						<th>URL</th>
					</tr>
				<?php foreach($pageList as $url=>$title): ?>
					<tr>
						<td><?= anchor('admin/editpage/' . $url, $title); ?></td>
						<td><?= $url; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
		<div class="span6">
			<h3>Template List</h3>
				<table class="table table-striped table-bordered table-condensed">
					<tr><th>Title</th>
						<th>Hash</th>
					</tr>
				<?php foreach($templateList as $hash=>$title): ?>
					<tr>
						<td><?= anchor('admin/edittemplate/' . $hash, $title); ?></td>
						<td><?= $hash; ?></td>
					</tr>
				<?php endforeach; ?>
				</table>
		</div>
	</div>
</div>