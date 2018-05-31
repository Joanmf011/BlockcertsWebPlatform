<?= $this->Html->css(['template/content.css']) ?>
<?= $this->Html->script(['template/content.js']) ?>
<div class="content-container">
	<div>
		<div class="row content-titles-row align-bottom">
			<span class="content-title">Create campaign</span>
			<span class="content-subtitle">Define</span>
		</div>
		<span class="create-text">
			Define the dates and sections of the venue where the campaign will be targeted.
		</span>

			<?=$this->element('Campaigns/define')?>

		<div class="content-titles-row">
			<?=$this->Html->link("<span class='ti-arrow-left'></span> Back",
										["controller"=>"campaigns","action"=>"create"],
										["escape"=>false, "class"=>"back-button"])?>
		</div>
	</div>
</div>