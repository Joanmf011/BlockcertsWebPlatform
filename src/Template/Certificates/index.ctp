<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<div class="content-container">
	<?php
		echo $this->element('Certificates/list');
	?>
</div>