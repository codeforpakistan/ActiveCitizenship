$(function()
{
	var layout = $.cookie('layout') ? $.cookie('layout') : 'fixed';	
	if (layout == 'fixed' && !$('.container-fluid:first').is('.fixed'))
		$('.container-fluid:first').addClass('fixed');
	
	if (layout == 'fluid' && $('.container-fluid:first').is('.fixed'))
		$('.container-fluid:first').removeClass('fixed');
	
	$('#footer [data-toggle="layout"]').not('[data-layout="'+layout+'"]').parent().removeClass('active');
	$('#footer [data-toggle="layout"][data-layout="'+layout+'"]').parent().addClass('active');
	
	$('#footer [data-toggle="layout"]').click(function(e)
	{
		e.preventDefault();
		if ($(this).parent().is('.active'))
			return;
		
		$('#footer [data-toggle="layout"]').not(this).parent().removeClass('active');
		$(this).parent().addClass('active');
		
		if ($(this).attr('data-layout') == 'fixed')
			$('.container-fluid:first').addClass('fixed');
		else
			$('.container-fluid:first').removeClass('fixed');
			
		$.cookie('layout', $(this).attr('data-layout'));
		
		if (typeof masonryGallery != 'undefined') 
			masonryGallery();
			
	});
});