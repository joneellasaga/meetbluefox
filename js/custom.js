
jQuery(document).ready(function($){
	//home page
	var homepage = $('body').hasClass('home');	
	var viewport_width = jQuery(document).width();
	if(homepage){
		
		setTimeout(function(){
			var eval_title = $('#evaluate-title').css('left');	
			$('#process-title').css({'left': eval_title});
			
		},2000);
		
		$(window).resize(function(){
			var eval_title = $('#evaluate-title').css('left');	
				
			$('#process-title').css({'left': eval_title});
			
		});
		
		if(viewport_width < 768){
			$('#process-desktop-row').remove();
		}
		else{
			$('#process-mobile-row').remove();
		}
		//$('#home-testimonial').remove();
	}	
		
	//change header icon
	$('.googleplus-hover i').removeClass('fa-googleplus').addClass('fa-google-plus');
	$('.youtube-hover i').removeClass('fa-youtube').addClass('fa-youtube-play');
	
	
	$('#close-menu').click(function(){
		$('.st-pusher').trigger('click');
	});		

	$('input,textarea').focus(function () {
        $(this).data('placeholder', $(this).attr('placeholder'))
               .attr('placeholder', '');
    }).blur(function () {
        $(this).attr('placeholder', $(this).data('placeholder'));
    });
	
	if($('html').hasClass('Edge')){
		setInterval(function(){
			if($('.Edge #st-trigger-effects button').hasClass('icon-cycle-1')){
				$('.Edge #st-trigger-effects button').addClass('icon-cycle-2').removeClass('icon-cycle-1');
				
			}else{
				$('.Edge #st-trigger-effects button').addClass('icon-cycle-1').removeClass('icon-cycle-2');
			}
	
		},2000);	 
	}
	
	$('.close-st-menu').on('click', function(){
		$('#st-container').removeClass('st-menu-open');		
		setTimeout(function(){
			$('#st-container').removeClass('st-effect-11 st-effect-1');
		},800);
	});
	
	//custom gravity form
	$('.gform_wrapper input').live('focus',
		function(){					
			$(this).css('border-color', 'inherit');
		}
	);
	$('.gform_wrapper textarea').live('focus',
		function(){					
			$(this).css('resize', 'vertical');
		}
	);
	$('.home-form').attr('autocomplete', 'off');
	
	$('.gform_button').live('click', function(event){
		
		event.preventDefault();
		event.stopPropagation();
		var gform_id = $(this).attr('id').split('_').pop();
		
		//$('#gform_'+gform_id + '.gform_body input :eq('+index+')').focus();
		//console.log(gform_id);
		var gform_val = [];
		$('#gform_'+gform_id + ' .gform_body input').map(function(){ 
			gform_val.push({value: $(this).val(), id: $(this).attr('id')}); 
			switch(gform_id){
				case '8':
				break;
				default:
					if($(this).val() === '' || $(this).val() == null){
						$(this).attr('style', 'border-color: #0397d2 !important');
					}
				break;
			}
		});
		
		
		switch(gform_id){
			case '3':
							
				for(var i = 0; i < gform_val.length; i++){
					if(gform_val[i]['value'] === '' || gform_val[i]['value'] == null){
						$('#'+gform_val[i]['id']).attr('style', 'border: 1px solid #0397d2 !important');
						return;
					}					
				}	
				$('#gform_submit_button_'+ gform_id).val('Sending');
				$('#gform_'+gform_id).submit();			
				
			break;
			case '4':
				$('#gform_'+gform_id).find('.gform_body input').each(function(index){
					var gform_val = $(this).val();
					if(gform_val === '' || gform_val == null){
						$(this).attr('style', 'border-color: #0397d2 !important');			
						
						return;
					}	
					else{
						$('#gform_'+gform_id).submit();
					}			
				});
			break;
			
			default:
				$('#gform_'+gform_id).submit();
			break;
		}
				
		
		console.log("Submitted");		
		//return false;
		
	});
	
	$('#gform_4').find('.gform_body input').each(function(i){
		i = i + 10;
		$(this).attr('tabindex', i);		
	});
	$('.screen-reader-shortcut').attr('tabindex', '0');
	$('#gform_4').find('.gform_body textarea').attr('tabindex', '15');
	$('#gform_4').find('.gform_button').attr('tabindex', '16');

});

jQuery(window).scroll(function() {
		var sticky = jQuery('header').hasClass('a-sticky');
		var st_effect11 = jQuery('#st-container').hasClass('st-effect-11');
		var st_width = jQuery(document).width();
		var st_top = jQuery(window).scrollTop();
		var edge = jQuery('html').hasClass('Edge');
		var safari = jQuery('html').hasClass('Safari');
		
		//for mobile and old desktop resolution
		if(st_width <= 1024){
			
			if(st_top > 30) {
				jQuery('header').addClass('a-sticky');
			} 
			else{
				jQuery('header').removeClass('a-sticky');
			}
		}
		
		if(sticky && st_effect11 && st_top > 250){
			jQuery('#st-container').removeClass('st-menu-open');		
			setTimeout(function(){
				jQuery('#st-container').removeClass('st-effect-11');
			},800);
			
			
		}	
		
		if( (st_top > 250) && (edge || safari) ){
			jQuery('.st-pusher:first-child').css('overflow', 'visible');			
		}
		
		/*if( st_top < 40 && safari ){
			jQuery('header').removeClass('a-sticky');
		}*/
		
		if(st_top <= 0) {
			jQuery('#st-container').removeClass('st-menu-open');
			jQuery('.st-pusher:first-child').css('overflow', 'hidden');
		} 
		
	});

