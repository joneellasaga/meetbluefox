jQuery(document).ready(function($){
	
	//about & contact us header animation
	setTimeout(function(){
    $('.header-img-title1').animate({
		opacity: 1 }, 500, "linear", function(){})
  	},200);
	
	//marketing services
	 $('.sales-funnel-list.sales-funnel-desktop dt').each(function(){
	   $(this).addClass('mk-animate-element');
	 });
	
	//testimonials
	$('.mk-testimonial-image').each(function(){
		var img = $(this).find('img').attr('src').replace('-150x150', '');
		$(this).find('img').attr('src', img);  
	 });
	 
	$('.projects-masonry-container .vc_gitem-zone img').each(function(){
		var grid_img = $(this).attr('src').replace('-1024x1024', '');
		 //console.log(grid_img);
	});
	
	//media services
	var viewPortWidth = window.innerWidth;
	  setTimeout(function(){
		  var laptop_height = $('.infographic-laptop img').height();
		  var laptop_width = $('.infographic-laptop img').width();	  
		  $('.infographic-laptop img').css('margin-left', '-' + laptop_width / 2 + 'px');
		  $('.stat17').css('height', laptop_height + 55);
		
		  if(viewPortWidth <= 768){
			  $('.stat15').css('height', laptop_height - 187);
			  $('.stat16').css('height', laptop_height - 74);
		  }
		  else if(viewPortWidth <= 1024){
			  $('.stat15').css('height', laptop_height - 263);
			  $('.stat16').css('height', laptop_height - 110);
		  }
		
		  else {
			  $('.stat15').css('height', laptop_height - 330);
			  $('.stat16').css('height', laptop_height - 135);
		  }
	
	  }, 2000);
	  
	  if(viewPortWidth <= 480){
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/03/explainer-mobile.jpg");
	  
	  }
	  else{
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/01/explainer-background.jpg");
	  }
	
	
	$(window).resize(function(){
		laptop_height = $('.infographic-laptop img').height();  
		laptop_width = $('.infographic-laptop img').width();
		viewPortWidth = window.innerWidth;
		$('.infographic-laptop img').css('margin-left', '-' + laptop_width / 2 + 'px');
		$('.stat17').css('height', laptop_height + 55);
		
		if(viewPortWidth <= 768){
		  $('.stat15').css('height', laptop_height - 187);
		  $('.stat16').css('height', laptop_height - 74);
		}
		else if(viewPortWidth <= 1024){
		  $('.stat15').css('height', laptop_height - 263);
		  $('.stat16').css('height', laptop_height - 110);
		}
		else {
		  $('.stat15').css('height', laptop_height - 330);
		  $('.stat16').css('height', laptop_height - 135);
		} 
	  
		if(viewPortWidth <= 480){
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/03/explainer-mobile.jpg");
	  
		} 
		else{
		  $('.explainer-container').attr('data-vc-parallax-image', "/wp-content/uploads/2017/01/explainer-background.jpg");
		}
	  });
	  $('.mk-testimonial-image').each(function(){
		  var img = $(this).find('img').attr('src').replace('-150x150', '');
		  $(this).find('img').attr('src', img);  
	});
});