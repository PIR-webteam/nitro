jQuery(document).ready(function($) {
  						
/*-----------------------------------------------------------------------------------*/
/*	Isotope - http://isotope.metafizzy.co/
/*-----------------------------------------------------------------------------------*/
   

		// cache container
		var $container = $('#section-content .portfolio-container');
		// initialize isotope
		$container.isotope({
		  	itemSelector : '.module-container',
		  	layoutMode : 'fitRows',
		  	animationOptions: {
			     duration: 200,
			     queue: false
			   }
		});
		
		// filter items when filter link is clicked
		$('#portfolio-filter a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  return false;
		});
		
	
		// re-rack items after the entire page loads
	    $(document).load(function(){
	        setTimeout(function() {
				    $container.isotope('reLayout');
				}, 750);
	    });
	    
	    // re-rack items after the entire page loads
	    $(window).load(function(){
	        setTimeout(function() {
				    $container.isotope('reLayout');
				}, 750);
	    });
		
		// re-rack items when a layout view is changed
		$(".portfolio-view span").click(function () {
			 setTimeout(function() {
			    $container.isotope('reLayout');
			}, 200);
		});
	    
		 
		 $(".portfolio-4 .container .module-container:nth-child(4n+5)").addClass("clearleft");		
		 $(".portfolio-3 .container .module-container:nth-child(3n+4)").addClass("clearleft");		
		 $(".portfolio-2 .container .module-container:nth-child(2n+3)").addClass("clearleft");	
		 	
		 $(".hybrid-blog-4 .container .hybrid:nth-child(4n+5)").addClass("clearleft");		
		 $(".hybrid-blog-3 .container .hybrid:nth-child(3n+4)").addClass("clearleft");		
		 $(".hybrid-blog-2 .container .hybrid:nth-child(2n+3)").addClass("clearleft");	
		 
		 $(".breakout-row .container .columns:nth-child(4n+6)").addClass("clearleft");	
		 
		 $("a.button").click(function () {
		 	
			 $(".portfolio-4 .container .module-container").removeClass("clearleft").css('height', $(".module-container").height());
			 $(".portfolio-3 .container .module-container").removeClass("clearleft").css('height', $(".module-container").height());
			 $(".portfolio-2 .container .module-container").removeClass("clearleft").css('height', $(".module-container").height());
			
		 });		 
		
		 
		 // Four Column Buttons Actions
		 $("span.4-col-grid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-hybrid view-list").addClass("four columns view-grid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeOut(100).removeClass("four columns alpha omega visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","0.5");
			 $("#.portfolio-4 .container .module-container").css('height', 'auto');			 
		 });
		 
		 $("span.4-col-hybrid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-grid view-list").addClass("four columns view-hybrid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("omega").addClass("four columns alpha visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","0.5");
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-4 .container .module-container").css('height', 'auto');
		 }); 
		 
		 $("span.4-col-list").click(function () {
			 $("#portfolio-list .module-container").removeClass("four columns view-grid view-hybrid").addClass("sixteen columns view-list");			 
			 $("#portfolio-list .module-img").addClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("alpha").addClass("four columns omega visible");
			 $(".list_btn").css("opacity","0.5"); 
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-4 .container .module-container").css('height', 'auto');
		 }); 
		 
		 // Three Column Buttons Actions
		 $("span.3-col-grid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-list view-hybrid").addClass("one-third column view-grid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeOut(100).removeClass("one-third column alpha omega visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","0.5");
			 $("#.portfolio-3 .container .module-container").css('height', 'auto');
		 });
		 
		 $("span.3-col-hybrid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-list view-grid").addClass("one-third column columns view-hybrid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("omega").addClass("one-third column alpha visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","0.5");
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-3 .container .module-container").css('height', 'auto');
		 }); 
		 
		 $("span.3-col-list").click(function () {
			 $("#portfolio-list .module-container").removeClass("one-third column view-grid view-hybrid").addClass("sixteen columns view-list");			 
			 $("#portfolio-list .module-img").addClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("one-third column alpha").addClass("four columns omega visible");
			 $(".list_btn").css("opacity","0.5"); 
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-3 .container .module-container").css('height', 'auto');
		 }); 
		 		 
		 // Two Column Buttons Actions
		 $("span.2-col-grid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-list view-hybrid").addClass("eight columns view-grid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeOut(100).removeClass("eight columns alpha omega visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","0.5");
			 $("#.portfolio-2 .container .module-container").css('height', 'auto');
		 });
		 
		 $("span.2-col-hybrid").click(function () {
			 $("#portfolio-list .module-container").removeClass("sixteen columns view-list view-grid").addClass("eight columns view-hybrid");
			 $("#portfolio-list .module-img").removeClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("four columns omega").addClass("eight columns alpha visible");
			 $(".list_btn").css("opacity","1");
			 $(".hybrid_btn").css("opacity","0.5");  
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-2 .container .module-container").css('height', 'auto');
		 }); 
		 
		 $("span.2-col-list").click(function () {
			 $("#portfolio-list .module-container").removeClass("eight columns view-grid").addClass("sixteen columns view-hybrid");			 
			 $("#portfolio-list .module-img").addClass("twelve columns alpha");
			 $("#portfolio-list .module-meta").fadeIn(300).removeClass("eight columns alpha").addClass("four columns omega visible");
			 $(".list_btn").css("opacity","0.5"); 
			 $(".hybrid_btn").css("opacity","1");
			 $(".grid_btn").css("opacity","1");
			 $("#.portfolio-2 .container .module-container").css('height', 'auto');
		 }); 
		 


/*-----------------------------------------------------------------------------------*/
/* prettyPhoto or iLightbox 
/*-----------------------------------------------------------------------------------*/

		/* $("a[data-rel^='prettyPhoto']").prettyPhoto();
		$("a[rel^='prettyPhoto']").prettyPhoto();		
		$('.iLightbox').prettyPhoto();			
		$("a[rel^='instagram-sc-images']").prettyPhoto();
		$("a[rel^='instagram-images']").prettyPhoto(); */
				
		/* $("a[data-rel^='prettyPhoto']").iLightBox();
		$("a[rel^='prettyPhoto']").iLightBox();		
		$('.iLightbox').iLightBox();			
		$("a[rel^='instagram-sc-images']").iLightBox();
		$("a[rel^='instagram-images']").iLightBox(); */
		
  		 
/*-----------------------------------------------------------------------------------*/
/*	DropDown Menu - http://users.tpg.com.au/j_birch/plugins/superfish/
/*-----------------------------------------------------------------------------------*/
		/*  $(".menu ul li").horizontalMenu({
			timeHide: 900
		});	 */
	
  		
		 $("ul.sf-menu").supersubs({
		 	minWidth:    14,   // minimum width of sub-menus in em units 
            maxWidth:    29,   // maximum width of sub-menus in em units 
            extraWidth:  0    // extra width can ensure lines don't sometimes turn over 
                               // due to slight rounding differences and font-family 
		 }).superfish({
		 	delay: 600,
		 	Speed: 100,
		 	animation:   {opacity:'show',height:'show'},
		 	autoArrows: true
		 }); 
		 
		 $("#responsive-nav select").change(function() {
  			window.location = $(this).find("option:selected").val();
		 });
		 




});