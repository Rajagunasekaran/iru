jQuery(window).load(function($){
	jQuery('.iru_category').each(function(){
		jQuery(this).removeClass('loading');
	});
	
});

jQuery(document).ready(function($) {
  	sliders();	
	menu_converter();
	//jQuery('.iru_button.top').hide();
	
	jQuery(document).on('click','.spanmenu',function(){
		jQuery('#sidebar-left .widget_nav_menu').each(function(){
			if(jQuery(this).hasClass('active')){
			  jQuery(this).find('ul.menu').stop().slideToggle();
			}
		});
		
	});
	
	
	
	jQuery(document).on('click','ul.download a,.iru-dropdown .dropdown-menu a',function(){
		window.open(jQuery(this).attr('href'));
	});
	
	// research strenghts type change
	function change_research_type(types){	
		jQuery('.content_Tabs .contenttab').each(function(){
			if(jQuery(this).hasClass(types)){
				jQuery(this).addClass('active');
				
				var $container = jQuery('.isotope').isotope({
					itemSelector: '.research_info',				
					filter:'.'+types,
					layoutMode: 'fitRows',
					fitRows: {
						gutter: -1
					}
				});
			
				
			}else{
				jQuery(this).removeClass('active');	
			}
		});
		jQuery('.research_Types li').each(function(){
			if(jQuery(this).hasClass(types)){
				jQuery(this).addClass('active');				
			}else{
				jQuery(this).removeClass('active');		
			}
		});
	}

	var pathArray = window.location.href.split( '/' );
	if(pathArray[3]=='research-strengths' && (pathArray[4]!='' && pathArray[4]!=undefined)){
		var str_tag = pathArray[4];
    	var types = str_tag.substr(1);
		change_research_type(types);
	}
	/*for local*/
	// if(pathArray[4]=='research-strengths' && (pathArray[5]!='' && pathArray[5]!=undefined)){
	// 	var str_tag = pathArray[5];
	// 	var types = str_tag.substr(1);
	// 	change_research_type(types);
	// }
	jQuery(document).on('click','ul.research_Types a',function(){
		var types = jQuery(this).data('class');
		change_research_type(types);
		// jQuery('.content_Tabs .contenttab').each(function(){
		// 	if(jQuery(this).hasClass(types)){
		// 		jQuery(this).addClass('active');				
		// 		var $container = jQuery('.isotope').isotope({
		// 			itemSelector: '.research_info',				
		// 			filter:'.'+types,
		// 			layoutMode: 'fitRows',
		// 			fitRows: {
		// 				gutter: -1
		// 			}
		// 		});				
		// 	}else{
		// 		jQuery(this).removeClass('active');	
		// 	}
		// });
		// jQuery('.research_Types li').each(function(){
		// 	if(jQuery(this).hasClass('active')){
		// 		jQuery(this).removeClass('active');				
		// 	}
		// });
		// jQuery(this).parents('li').addClass('active');		
	});
	
	jQuery(document).on('click', '.iru_button', function (e) {
					e.stopPropagation();
					var data_offset=jQuery(this).data('offset');
					var data_cat=jQuery(this).data('cat');
					var parent= jQuery(this).closest('.widget').attr('id');
					var $this = $(this);
					
					var pid = '#'+parent;
					var actual_height = jQuery(pid+' .list_containers').height();
					var next = jQuery(pid+' .iru_button.down').data('offset');
					var prev =  jQuery(pid+' .iru_button.top').data('offset');
					scroll_hight = parseInt(jQuery(pid+' .iru_category .listscroller').css('top'));
					if(jQuery(this).hasClass('top')){
						if(data_offset > 1){
							update_offset = parseInt(data_offset)-1;
							
							scrolling_hight = scroll_hight + actual_height;
							jQuery(pid+' .iru_category .listscroller').stop().animate({top:scrolling_hight+"px"},1000);
								 
							 jQuery(pid+' .iru_button.down').data('offset',data_offset); 
							 jQuery(pid+' .iru_button.top').data('offset',parseInt(update_offset)); 
						}else{
							 jQuery(this).addClass('disabled');
							 return false;	
						}
						
					}else if(next < jQuery(pid+' .iru_button.down').data('feed')){
						scrolling_hight = scroll_hight - actual_height;
						jQuery(pid+' .iru_category .listscroller').stop().animate({top:scrolling_hight+"px"},1000);
						update_offset = parseInt(data_offset) + 1;		 
						jQuery(pid+' .iru_button.down').data('offset',parseInt(update_offset)); 
						jQuery(pid+' .iru_button.top').data('offset',data_offset); 
							 
					}else if(data_offset * 5 <= 50){
						if(data_offset && jQuery(this).hasClass('top'))
							  data_offset--;
						
						
						jQuery('.iru_button.top').removeClass('disabled');
						ajax_responser(parent,data_offset,data_cat,$this);
						
					}else{
						jQuery(this).addClass('disabled');
						jQuery(this).addClass('archived');
						return false;	
					}
	});
	
	$('.conatct_btn').click(function(){
		var my_id = $(this).attr('id');
		$(this).html('<i class="fa fa-spinner fa-spin"></i> Please Wait');	
		$(this).closest('form').submit();
		setTimeout("iru_check_errors('.conatct_btn')",700);
	});
	
});

jQuery(window).resize(function(){
	menu_converter();
});
function sliders(){
	var wwidth = jQuery(window).width();
		jQuery('.iru-slider-container').slick({
		dots: true,
		infinite: false,
		arrows:true,
		speed: 500,
		slidesToShow: 1,
		slidesToScroll:1,
		autoplay: true
		});
		jQuery('.iru-slider-container .slick-prev').html('<i class="fa fa-angle-left"></i>');
		jQuery('.iru-slider-container .slick-next').html('<i class="fa fa-angle-right"></i>');

}

function ajax_responser(parent,iru_offset,iru_cat,$this){
		var actual_text = $this.html();
		jQuery.ajax({
		type: 'POST',
		url: IRU_AJAX+'&method=iru_category',
		data:{offset:iru_offset,cat:iru_cat},
		beforeSend: function (){
		    $this.html('<img src="'+theme_location+'/img/ajax-loader.gif" alt="loading" />');
			$this.addClass('disabled');
		},
		success: function(result){ 		 
		 var pid = '#'+parent;
		 var scroll_hight = jQuery(pid+' .list_containers').height();
		 
		 c_offset = iru_offset - 1;		 
		 scroll_hight = jQuery(pid+' .iru_category .listscroller').height();
		 jQuery(pid+' .iru_category .listscroller').append(result);
		 jQuery(pid+' .iru_category .listscroller').animate({top:-scroll_hight+"px"},1000);
		 
		 
		 update_offset = parseInt(iru_offset)+1;	 
		 jQuery(pid+' .iru_button.down').data('offset',update_offset); 
		 jQuery(pid+' .iru_button.down').data('feed',update_offset); 
		 jQuery(pid+' .iru_button.top').data('offset',parseInt(iru_offset)); 
		 
		},
		error: function (xhr) {
		
		},
		complete: function(data){	
			$this.html(actual_text);
			$this.removeClass('disabled');
		/*jQuery('.iru_category .list_containers').animate({
    		scrollTop: jQuery('#data_10').offset().top - container.offset().top + container.scrollTop()
		});​*/
		/*jQuery('.iru_category .list_containers').animate({
   	       scrollTop: jQuery('#data_10').css('top')
    	}, 800);*/
				
		//setTimeout("jQuery('#app-box'"+next_step+").fadeIn()",2000);
		
		},//end success
		});//end jQuery.ajax 	
		return true;
}


function menu_converter(){
	var window_width = jQuery(window).width();	
	if(window_width <= 767){
		var menu_str = '';
		jQuery(document.body).find('#sidebar-left .widget_nav_menu').each(function(){
			if(jQuery(this).find('ul.menu') && !jQuery(this).hasClass('active')){
				jQuery(this).addClass('active');
				jQuery(this).append('<div class="spanmenu">Menu <i class="fa fa-chevron-down"></i></div>');
			}
		});
		
		
		jQuery(document).on('click','a.hasChild',function(){
			window.location.href = jQuery(this).attr('href'); return false; 
		});
		
		jQuery(document).on('click','#sidebar-left .widget-title',function(){
			if(!jQuery(this).next().hasClass('openToggle')){
				jQuery('#sidebar-left .openToggle').each(function(){
					jQuery(this).slideUp();
					jQuery(this).removeClass('openToggle');
				});
				
				jQuery(this).next().stop().slideDown();
				jQuery(this).next().addClass('openToggle');
			}else if(jQuery(this).next().hasClass('openToggle')){
				jQuery(this).next().slideUp();
				jQuery(this).next().removeClass('openToggle');
			}else{
				jQuery(this).next().slideDown();
				jQuery(this).next().addClass('openToggle');
			}
			
		});
		/*if(jQuery(document.body).find('#sidebar-left .widget_categories')){
			
			jQuery(this).addclass('active');
		}
		jQuery(document.body).find('#sidebar-left .widget_tag_cloud').addclass('active');
		jQuery(document.body).find('#sidebar-left #text-5').addclass('active');*/
		
		
	}

}

function iru_check_errors(cid){
  if(jQuery(cid).closest('form').find('.wpcf7-response-output').hasClass('wpcf7-validation-errors')){
	  jQuery(cid).html(jQuery(cid).attr('data-text'));
  }else if(jQuery(cid).closest('form').find('.wpcf7-response-output').hasClass('wpcf7-mail-sent-ok')){
  	   jQuery(cid).html(jQuery(cid).attr('data-text'));
	   jQuery('#hear_about').attr('selectedIndex', 0);
	   setTimeout("jQuery('.wpcf7-mail-sent-ok').fadeOut('slow')",2000);
  }else{
 		 setTimeout("iru_check_errors('"+cid+"')",700);
  }	
}

