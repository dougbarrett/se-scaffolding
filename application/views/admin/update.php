<div class="container">
	<div class="row">
		<div class="span12">
			<?php if($systemSettings->versionhash == $updateData->hash): ?>
				<p>"No update available!"</p>
			<?php else: ?>
				<p>"Update Available!"</p>
			<?php endif; ?>
		</div>
	</div>
</div>