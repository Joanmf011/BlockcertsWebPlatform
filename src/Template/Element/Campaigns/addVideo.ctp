<?= $this->Html->css(['image-picker/image-picker.css']) ?>
<?= $this->Html->script(['image-picker/image-picker.js']) ?>
<?= $this->Html->script(['image-picker/image-picker.min.js']) ?>

<div id="add-video" class="block-blue create-option">
	<button id="add-video-button" class="block-blue create-option-toggle" onclick="toggleVideo()">
		<span class='ti-video-clapper option-icon'></span>
		<span class="option-text"> Add video</span>
		<span id="add-video-toggleicon" class='ti-angle-down toggleicon'></span>
	</button>

	<div id="media-video-container" class="choose-media-container hidden">
		<div style="color: #535353; padding-bottom: 20px;">Choose a video for your campaign.</div>
		<?=$this->Form->create("Campaigns", array('url'=>'/Campaigns/define'))?>

		<div class="picker">
	      <select id="video-imagepicker" class="image-picker show-html" name="video-select">
	        <option value=''></option>
	        <option data-img-src='/img/masrierathumbnail.png' value='1'>telefonica</option>
	      </select>
	    </div>

		<div style="text-align: center; margin-top: 20px;">
			<?=$this->Form->button("<span class='ti-check'></span> Continue", ['class'=>'btn btn-default blue-button disabled', 'id'=>'confirm-video-button'],
									["escape"=>false])?>
		</div>
		<?=$this->Form->end()?>
	</div>	
</div>

<script type="text/javascript">

    $('#confirm-video-button').attr("disabled","true");

    jQuery("select.image-picker").imagepicker({
      hide_select:  true,
    });

    $('#video-imagepicker').change(function(){
    	if(this.value===""){
    		$('#confirm-video-button').attr("disabled","true");
    		$('#confirm-video-button').addClass("disabled");
    	}else{
    		$('#confirm-video-button').removeAttr("disabled");
    		$('#confirm-video-button').removeClass("disabled");
    	}
    });

</script>