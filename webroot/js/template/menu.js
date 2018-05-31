var open = false;
function onClickMenuToggle(){
	if(open){
		$('.main-content').addClass('closed');
		$('.menu-text').addClass('closed');
		$('.menu-component').addClass('closed');
		$('.menu-logo').addClass('closed');
		$('.side-nav').addClass('closed');
		$('.container').addClass('closed');
		$('#toggle-icon').attr('class', 'ti-align-justify');
		$('#toggle-icon-mobile').attr('class', 'ti-align-justify');
	}else{
		$('.main-content').removeClass('closed');
		$('.menu-text').removeClass('closed');
		$('.menu-component').removeClass('closed');
		$('.menu-logo').removeClass('closed');
		$('.side-nav').removeClass('closed');
		$('.container').removeClass('closed');
		$('#toggle-icon').attr('class', 'ti-close');
		$('#toggle-icon-mobile').attr('class', 'ti-close');
	}
	open = !open;
}