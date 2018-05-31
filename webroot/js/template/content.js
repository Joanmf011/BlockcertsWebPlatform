var imageOpen = false;
function toggleImage(){
	$('#add-image-button').attr('disabled', true);
	if(!imageOpen){
		$('#add-image').addClass('open');
		$('#add-image-button').addClass('open');
		$('#add-image-toggleicon').addClass('open');
		$('#media-image-container').removeClass('hidden');

		setTimeout(function(){
			$('#media-image-container').addClass('open');
			$('#add-image-button').removeAttr('disabled');
		},300);

		imageOpen = true;
	}else{
		$('#add-image').removeClass('open');
		$('#add-image-button').removeClass('open');
		$('#add-image-toggleicon').removeClass('open');
		$('#media-image-container').removeClass('open');

		setTimeout(function(){
			$('#media-image-container').addClass('hidden');
			$('#add-image-button').removeAttr('disabled');
		},500);

		imageOpen = false;
	}
	$('#add-video').removeClass('open');
	$('#add-video-button').removeClass('open');
	$('#add-video-toggleicon').removeClass('open');
	$('#media-video-container').removeClass('open');

	setTimeout(function(){
		$('#media-video-container').addClass('hidden');
	},500);
	videoOpen = false;
}


var videoOpen = false;
function toggleVideo(){
	$('#add-video-button').attr('disabled', true);
	if(!videoOpen){
		$('#add-video').addClass('open');
		$('#add-video-button').addClass('open');
		$('#add-video-toggleicon').addClass('open');
		$('#media-video-container').removeClass('hidden');

		setTimeout(function(){
			$('#media-video-container').addClass('open');
			$('#add-video-button').removeAttr('disabled');
		},300);

		videoOpen = true;
	}else{
		$('#add-video').removeClass('open');
		$('#add-video-button').removeClass('open');
		$('#add-video-toggleicon').removeClass('open');
		$('#media-video-container').removeClass('open');

		setTimeout(function(){
			$('#media-video-container').addClass('hidden');
			$('#add-video-button').removeAttr('disabled');
		},500);

		videoOpen = false;
	}
	$('#add-image').removeClass('open');
	$('#add-image-button').removeClass('open');
	$('#add-image-toggleicon').removeClass('open');
	$('#media-image-container').removeClass('open');

	setTimeout(function(){
		$('#media-image-container').addClass('hidden');
	},500);
	imageOpen = false;
}