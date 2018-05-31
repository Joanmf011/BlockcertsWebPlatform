<div class="addcampaign-container">
	<div class="addcampaign-text">
		Looks like you don't have any active campaigns at the moment. Click in the button below to start creating one.
	</div>
	<div class="block-blue addcampaign-btncontainer">

		<div class="addcampaign-btncontainer-texts">
			<div class="addcampaign-btncontainer-title">
				Create a new campaign,
			</div><br>
			<div class="addcampaign-btncontainer-subtitle">
				In just two steps, complete <br>your new campaign. Choose the details <br>and everything you need.
			</div>
		</div>

		<?=$this->Html->link("<span class='ti-plus' style='margin-right: 8px;'></span> Add campaign", 
										["controller"=>"campaigns","action"=>"create"],
										["escape"=>false, 'class'=>'btn btn-default superblue-button'])?>
	</div>
</div>