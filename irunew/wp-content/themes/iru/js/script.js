jQuery(document).ready(function($) {
	
	
	
	if($(document.body).find('.entry-content')){
		$('.entry-content p').each(function(){
			var str = $(this).html();
			if(str.trim() == ''){
				$(this).remove();	
			}
		});
		
	}
	
	
	jQuery(document).on('click','.menu li.dropdown a>span',function(){
		window.location.href=jQuery(this).parent().attr('href');
		return false;
	});
	
	if($(document.body).find('.widget_nav_menu ul.menu')){
		$('.widget_nav_menu > div > ul.menu > li').each(function(){
			if($(this).find('ul.sub-menu')){
				var i = 0;
				var top_parent = $(this);
				$(this).find('ul.sub-menu').each(function(){
					
					if(i == 0){
						top_parent.find('a').addClass('hasChild');
						$(this).addClass('top-child');	
					}
					i++;
					$(this).find('li').each(function(){
						if($(this).hasClass('current-menu-item') == true){
							top_parent.addClass("show_childs");
						}
					});
				});
			}
		});
	}
  	$(document).on('click','.widget_nav_menu > div > ul.menu > li.dropdown > a .fa',function(e){
		var child_menu = $(this).parent().parent().find('ul.sub-menu').attr('class');
		
		if(typeof child_menu != "undefined"){
			e.preventDefault();
			$(this).addClass('active');	
			if($(this).hasClass('fa-plus')){
			$(this).removeClass('fa-plus').addClass('fa-minus');
			}else
			{
	         $(this).removeClass('fa-minus').addClass('fa-plus');
			}
			$(this).parent().parent().find('ul.top-child').slideToggle();
		}
	
	});
	
	
	$('.simple-ajax-popup').magnificPopup({
		type: 'ajax',
		alignTop: true,
		overflowY: 'scroll'
	});

	$('.popup-modal').magnificPopup({
		type: 'inline',
		fixedContentPos: false,
		fixedBgPos: true,
		closeBtnInside: true,
		preloader: true	
	});	
	
});

