<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<div class="content-container">
	<div>
		<div class="row content-titles-row align-bottom">
			<span class="content-title">Create campaign</span>
			<span class="content-subtitle">Select resources</span>
		</div>
		<span class="create-text">
			Choose the type of advertisement for your campaign.
		</span>

			<?=$this->element('Campaigns/addImage')?>
			<?=$this->element('Campaigns/addVideo')?>

		<div class="content-titles-row">
			<?=$this->Html->link("<span class='ti-arrow-left'></span> Back",
										["controller"=>"campaigns","action"=>"index"],
										["escape"=>false, "class"=>"back-button"])?>
		</div>

	</div>
</div>