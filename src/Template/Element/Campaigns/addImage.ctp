<?= $this->Html->css(['image-picker/image-picker.css']) ?>
<?= $this->Html->script(['image-picker/image-picker.js']) ?>
<?= $this->Html->script(['image-picker/image-picker.min.js']) ?>

<div id="add-image" class="block-blue create-option">
	<button id="add-image-button" class="block-blue create-option-toggle" onclick="toggleImage()">
		<span class='ti-image option-icon'></span>
		<span class="option-text"> Add image</span>
		<span id="add-image-toggleicon" class='ti-angle-down toggleicon'></span>
	</button>

	<div id="media-image-container" class="choose-media-container hidden">
		<div style="color: #535353; padding-bottom: 20px;">Choose an image for your campaign.</div>
		<?=$this->Form->create("Campaigns", array('url'=>'/campaigns/define'))?>

		<div class="picker">
	      <select id="image-imagepicker" class="image-picker show-html" name="image-select">
	        <option value=''></option>
	        <option data-img-src='/img/telefonica.png' value='1'>telefonica</option>
	        <option data-img-src='/img/caixabank.png' value='2'>caixabank</option>
	        <option data-img-src='/img/gasnaturalfenosa.png' value='3'>gasnaturalfenosa</option>
	      </select>
	    </div>

		<div style="text-align: center; margin-top: 20px;">
			<?=$this->Form->button("<span class='ti-check'></span> Continue", ['class'=>'btn btn-default blue-button disabled', 'id'=>'confirm-image-button'],
									["escape"=>false])?>
		</div>
		<?=$this->Form->end()?>
	</div>	
</div>

<script type="text/javascript">

	createToggleDisabled();

    jQuery("select.image-picker").imagepicker({
      hide_select:  true,
    });

    $('#image-imagepicker').change(function(){
    	createToggleDisabled();
    });

    function createToggleDisabled(){
    	if($('#image-imagepicker')[0].value===""){
			$('#confirm-image-button').attr("disabled","true");
			$('#confirm-image-button').addClass("disabled");
		}else{
			$('#confirm-image-button').removeAttr("disabled");
			$('#confirm-image-button').removeClass("disabled");
		}
    }


</script>