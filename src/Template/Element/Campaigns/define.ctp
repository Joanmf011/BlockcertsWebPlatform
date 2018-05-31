<script type="application/javascript" charset="UTF-8" src="https://tk3d.tk3dapi.com/ticketing3d/stable/TICKETING3D.js"></script>
<?= $this->Html->css(['bootstrap-datepicker/bootstrap-datepicker3.min.css']) ?>
<?= $this->Html->css(['bootstrap-datepicker/bootstrap-datepicker3.css']) ?>
<?= $this->Html->css(['tk3d_integration/experience.css']) ?>
<?= $this->Html->script(['bootstrap-datepicker/bootstrap-datepicker.js']) ?>
<?= $this->Html->script(['bootstrap-datepicker/bootstrap-datepicker.min.js']) ?>
<?= $this->Html->script(['tk3d_integration/tk3d_controller.js']) ?>
<?= $this->Html->script(['tk3d_integration/tk3d_config.js']) ?>

<?=$this->Form->create("Campaigns", array('url'=>'/campaigns/createCampaign'))?>
<div class="block">
	<!-- TIME SELECTION -->
	<div class="blue-title">
		<span class='ti-calendar option-icon'></span>
		<span class="option-text"> Dates</span>
		<span id="add-image-toggleicon" class='ti-angle-down toggleicon'></span>
	</div>
	<div style="color: #535353; padding-bottom: 20px;">
		Choose the period of time for your campaign to be active.
	</div>
	<div class="row pad-container">
		<!-- STARTING DATE -->
		<div class="blue-title col-md-6 date-selector" id="start-picker" name="start">
			<span class="option-text"> Start</span>
			<input type="text" class="form-control" id="start-form" name="start">
			
		</div>
		<!-- END DATE -->
		<div class="blue-title col-md-6 date-selector" id="end-picker" name="end">
			<span class="option-text"> End</span>
			<input type="text" class="form-control" id="end-form" name="end">
			
		</div>
	</div>
</div>

<div class="block">
	<!-- ZONE SELECTION -->
	<div class="blue-title">
		<span class='ti-location-pin option-icon'></span>
		<span class="option-text"> Locations</span>
		<span id="add-image-toggleicon" class='ti-angle-down toggleicon'></span>
	</div>
	<div style="color: #535353; padding-bottom: 20px;">
		Select the sections where your advertisement will be displayed.
	</div>
	<div class="row pad-container integration">
		<div id="main-interface" class="wrap-interface col-md-9">
			<div id="blockmap" class="interface active"></div>
		</div>
		<div id="sub-interface" class="col-md-3">
			<div id="toggleSelectButton" class="btn btn-default blue-button" onclick="toggleSelectAll()" style="margin: 20px 0;">
				<span class='ti-check'></span> Select all
			</div>
		</div>
	</div>
	<div style="text-align: center; margin-top: 20px;">
		<?=$this->Form->button("<span class='ti-check'></span> Continue", ['class'=>'btn btn-default blue-button disabled', 'id'=>'continue-define-button', 'disabled'=>true],
								["escape"=>false])?>
	</div>
</div>

<input type="text" class="hidden" id="sections-form" name="sections">

<?=$this->Form->end()?>

<script type="text/javascript">
	$('#start-picker input').datepicker({
		format: 'dd/mm/yyyy',
    	startDate: '0'
	});
	$('#end-picker input').datepicker({
		format: 'dd/mm/yyyy',
    	startDate: '+1d'
	});

	$("#start-form").on("change",function(){defineToggleDisabled()});
	$("#end-form").on("change",function(){defineToggleDisabled()});

	function defineToggleDisabled(){
		var selected_sections = blockmap.getSelected();
		var selected_count = selected_sections.length;
		var start = $("#start-form").val();
		var end = $("#end-form").val();

		if(start != "" && end != "" && end > start && selected_count > 0){

			var selected_ids = [];
			for (var i = selected_count - 1; i >= 0; i--) {
				selected_ids.push(selected_sections[i]["id"]);
			}
			$("#sections-form").val(selected_ids);
			$("#continue-define-button").removeClass("disabled");
			$("#continue-define-button").removeAttr("disabled");
		}else{
			$("#continue-define-button").addClass("disabled");
			$("#continue-define-button").attr("disabled","true");
		}
	}

</script>