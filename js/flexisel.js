$(window).load(function() {

	
	// sync the height of all the p elements in this document
	//$('.nob p').syncHeight({updateOnResize: true});
	// unsync they're heights again when the Browser window is narrower than 500px
	/*
	$(window).resize(function(){
		if($(window).width() < 500){
			$('.nob p').unSyncHeight();
		}
	});
*/

	
    $("#flexisel").flexisel({
    	visibleItems : 3,
        enableResponsiveBreakpoints: true,
        responsiveBreakpoints: { 
            portrait: { 
                changePoint:500,
                visibleItems: 1
            }, 
            landscape: { 
                changePoint:810,
                visibleItems: 2
            },
            tablet: { 
                changePoint:1024,
                visibleItems: 3
            }
        },
        clone:false,
        today: 2,
    });

});