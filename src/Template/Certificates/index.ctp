<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<div class="content-container">
	<?php
		if($campaign_config['type'] == "none"){
			echo $this->element('Campaigns/add');
		}else{
			echo $this->element('Campaigns/list');
		}
	?>
</div>