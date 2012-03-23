jQuery(document).ready(function( $ ){	
    // get the action filter option item on page load
    var $filterType = $('#filter li.active a').attr('class');
  
    // get and assign the ourHolder element to the
    // $holder varible for use later
    var $holder = $('.grid');

    // clone all items within the pre-assigned $holder element
    var $data = $holder.clone();

    $( '#filter' ).each(function( i ){

    	// Find all 'a' tags within out button pane
    	$buttons = $( this ).find('a');

        $buttons.click( function( e ){
            // reset the active class on all the buttons
            $('#filter li').removeClass('active');
            
            // assign the class of the clicked filter option
            // element to our $filterType variable          
            // Only take the first class of out item
            var $filterType = $( this ).attr( 'class' ).split(' ')[0];
            
          	$( this ).parent().addClass('active' );       	

         	if ( $filterType == 'all') {
                // assign all li items to the $filteredData var when
                // the 'All' filter option is clicked
                var $filteredData = $data.find('li');
         	} 

       	    else {
                // Match 'data-type' == 'first class of items'
                var $filteredData = $data.find( 'li[data-filter-type~="' + $filterType + '"]');                
       	    }
       	    
       	    // Finally implement the plugin
       	    $holder.quicksand( $filteredData, {
                duration: 800,
                easing: 'easeInOutQuad'
          	});            
        }); // End 'click'
    }); // End 'each'
}); // End 'document'
