// Switches out the main site nav#access with a select box
// Minimizes nav#access on mobile devices
// Now lets load the JS when the DOM is ready
jQuery(document).ready(function($){

	// Create the dropdown base
	  $("<select />").appendTo("nav.nav");

	  // Create default option "Go to..."
	  $("<option />", {
	     "selected": "selected",
	     "value"   : "#",
	     "text"    : "Go to..."
	  }).appendTo("nav.nav select");

	  // Populate dropdown with menu items
	  $("nav.nav .menu a").each(function() {
	   var el = $(this);
	   $("<option />", {
	       "value"   : el.attr("href"),
	       "text"    : el.text()
	   }).appendTo("nav.nav select");
	  });

	 // To make dropdown actually work
	 // To make more unobtrusive: http://css-tricks.com/4064-unobtrusive-page-changer/
	  $("nav.nav select").change(function() {
	    window.location = $(this).find("option:selected").val();
	  });

		// style select boxes
	  if (!$.browser.opera) {

	    $('nav.nav select').each(function(){
	      var title = $(this).attr('title');
	      if( $('option:selected', this).val() != ''  ) title = $('option:selected',this).text();
	      $(this)
		      .css({'z-index':10,'opacity':0,'-khtml-appearance':'none'})
		      .after('<span class="select">' + title + '</span>')
		      .change(function(){
	          val = $('option:selected',this).text();
	          $(this).next().text(val);
	         })
	    });

	  };

 
	// Generic show and hide wrapper class 
  	$(".wrap").live({
	
   		mouseover: function() {
      		$(".hide", this).stop().fadeTo(300, 1.0); // This sets 100% on hover
      		$(".fade", this).stop().fadeTo(300, 0.7); // This sets 70% on hover
      		$(".show", this).stop().fadeTo(300, 0.2); // This sets 100% on hover
      		
  		},
  		mouseout: function() {
      		$(".hide", this).stop().fadeTo(300, 0); // This should set the opacity back to 0% on mouseout
      		$(".fade", this).stop().fadeTo(300, 1.0); // This sets 80% on hover
      		$(".show", this).stop().fadeTo(300, 1.0); // This should set the opacity back to 0% on mouseout  
  		}
  });

  
  // Zebra stipes for tables
  $(".half:nth-child(2n+2)").addClass("end");
  $(".third:nth-child(3n+3)").addClass("end");
  $("td:odd").addClass("odd");
  
  // Tabs
	
	var tabs = $('dl.tabs');
		tabsContent = $('ul.tabs-content');
	
	tabs.each(function(i) {
		//Get all tabs
		var tab = $(this).children('dd').children('a');
		tab.click(function(e) {
			
			//Get Location of tab's content
			var contentLocation = $(this).attr("href");
			contentLocation = contentLocation + "Tab";
			
			//Let go if not a hashed one
			if(contentLocation.charAt(0)=="#") {
			
				e.preventDefault();
			
				//Make Tab Active
				tab.removeClass('active');
				$(this).addClass('active');
				
				//Show Tab Content
				$(contentLocation).parent('.tabs-content').children('li').css({"display":"none"});
				$(contentLocation).css({"display":"block"});
				
			} 
		});
	});
	
	$(".post").fitVids();
	$(".single-format-gallery .gallery").find("br").remove();
});