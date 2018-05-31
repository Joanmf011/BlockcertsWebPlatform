<div class="row content-titles-row align-bottom">
	<span class="content-title">Campaigns</span>
	<span class="content-subtitle">Dashboard</span>
</div>
<div class="content-mainblock block pad">
	<div style="margin-bottom: 20px; font-size: 11pt;">
		This is your active campaign:
	</div>

	<div class="row">
		<div class="col-xs-12 col-md-4 col-lg-4">
			<div class="thumbnail"><img class="image_picker_image" src=<?=$campaign_config['thumbnail']?>></div>
		</div>
		<div class="col-xs-12 col-md-8 col-lg-8">
			<span class="list-title">Details</span>

				<div class="list-item row">
					<div class="col-md-2">
						<span class="list-item-name">Type</span>
					</div>
					<div class="col-md-8">
						<span class="list-item-content"><?=$campaign_config['type']?></span>
					</div>
				</div>
				<div class="list-item row">
					<div class="col-md-2">
						<span class="list-item-name">Content</span>
					</div>
					<div class="col-md-8">
						<a class="list-item-content" href=<?=$campaign_config['url']?> target="_blank"><?=$campaign_config['url']?></a>
					</div>
				</div>
				<div class="list-item row">
					<div class="col-md-2">
						<span class="list-item-name">View</span>
					</div>
					<div class="col-md-8">
						<!--<span class="list-item-content"><?=$campaign_config['blocks'][0]?></span>-->
					</div>
				</div>
		</div>
	</div>

	<div style="text-align: center;">

		<?=$this->Html->link("<span class='ti-pencil-alt' style='margin-right: 8px;'></span> Edit",
							["controller"=>"campaigns","action"=>"create"],
							["escape"=>false, "class"=>"btn btn-default blue-button", "style"=>"width: 110px;"])?>

		<?=$this->Html->link("<span class='ti-trash' style='margin-right: 8px;'></span> Delete",
							["controller"=>"campaigns","action"=>"delete"],
							["escape"=>false, "class"=>"btn btn-default blue-button", "style"=>"width: 110px;", "onclick"=>"return confirm('Your current campaign will be deleted. Are you sure?')"])?>

	</div>

</div>