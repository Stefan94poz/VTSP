$(document).ready(function(){

	$('ul.tabs li').click(function(){
		var tab_id = $(this).attr('data-tab');

		$('ul.tabs li').removeClass('current');
		$('.tab-content').removeClass('current');

		$(this).addClass('current');
		$("#"+tab_id).addClass('current');
	})

})

$(document).ready(function(){

	$('.sub-tab-header-2').click(function(){
			$('.tab-items-2').children().slideToggle("fast");
	}).click();
	$('.sub-tab-header-3').click(function(){
			$('.tab-items-3').children().slideToggle("fast");
	}).click();
})
