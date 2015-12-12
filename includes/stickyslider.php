<?php
<script>

 $(document).ready(function(){
	
<!-- start function -->
function resetValues(){
	//$('div').removeAttr('style');
	$('.list-view-box div:first-child').removeAttr('style');
	if(width > 767){
	
 	if(jQuery.support.leadingWhitespace == false){
 	}else {
	  
	  var top = $('.sticky-scroll-box').offset().top;
	  var stickyHeight = $('.sticky-scroll-box').height();
	  var boxHeight = $('#content').height();
	  var stickyHeight;
	  var bottom = $('.end-sticky').offset().top - stickyHeight;
	
		  $('.sticky-scroll-box').stop().removeClass('fixed absolute relative');
		  $('.fixed-side').removeAttr('style').css({"height": boxHeight + "px"});
		  $('.sticky-scroll-box').width($('.fixed-side').width());
		  
		
		  $(window).scroll(function (event) {
			var boxHeight = $('#content').height();
			var y = $(this).scrollTop();
			if (y >= top ){
			  $('.sticky-scroll-box').removeClass('absolute').addClass('fixed');
		}else{
			$('.sticky-scroll-box').removeClass('fixed').removeClass('absolute');
			$('.sticky-scroll-box').width($('.fixed-side').width());
			
		}
	  
			if (y >= bottom){
		   		$('.sticky-scroll-box').removeClass('fixed').addClass('absolute');
		   		$('.sticky-scroll-box').width($('.fixed-side').width());
			}
	  
	  });
	  }
  
} else {
	var stickyHeight = $('.sticky-scroll-box').height();
	$('.fixed-side').removeAttr('style').css({"height": stickyHeight + "px"});
	$('.sticky-scroll-box').stop().removeClass('fixed absolute').addClass('relative');
	}
	
};

// animate the sticky box if the screen size is larger then 767 px and not IE 8 //

function setSticky(){	
		
		if(width > 767){
		 if(jQuery.support.leadingWhitespace == false){
			 }else {
			  
			  var top = $('.sticky-scroll-box').offset().top;
			  var stickyHeight = $('.sticky-scroll-box').height();
			  var boxHeight = $('#content').height();
			  var stickyHeight;
			  var bottom = $('.end-sticky').offset().top - stickyHeight;
			 
				  $('.fixed-side').css({"height": boxHeight + "px"});
				  $('.sticky-scroll-box').width($('.fixed-side').width());
				  
				  $(window).resize(function(){
						var boxHeight = $('#content').height();
						$('.fixed-side').css({"height": boxHeight + "px"});
						$('.sticky-scroll-box').width($('.fixed-side').width());
					});
				
				  $(window).scroll(function (event) {
					var boxHeight = $('#content').height();
					var y = $(this).scrollTop();
					if (y >= top ){
					  $('.sticky-scroll-box').removeClass('absolute').addClass('fixed');
				}else{
					$('.sticky-scroll-box').removeClass('fixed absolute');
					$('.sticky-scroll-box').width($('.fixed-side').width());
					
				}
			  
					if (y >= bottom){
						$('.sticky-scroll-box').removeClass('fixed').addClass('absolute');
						$('.sticky-scroll-box').width($('.fixed-side').width());
					}
			  
			  });
			  }
			}	
	
}  //end function



<!-- end function -->	
	
	
	
var width = $(window).width();

$(window).resize(function(){
   if($(this).width() != width){
      width = $(this).width();
    
   }
});

setSticky();


// create new height and reset code for sticky box on window resize 

	$(window).resize(function(){
		resetValues();
	
});


//toggle switch code for calendar view && Resize the height of the sticky window if clicked on Calendar View

 $('#toggle-switch').click(function(){
		  $('.list-view').toggle();
		  $('.large-calendar').toggle();
		  $(this).toggleClass('on');
		  setSticky();
		  
		  });	  
	$('#link-list-view').click(function(){
		$('.large-calendar').hide();
		$('.list-view').show();
		$('#toggle-switch').removeClass('on');
			resetValues();
		
		});
		
		
	$('#link-cal-view').click(function(){
		$('.list-view').hide();
		$('.large-calendar').show();
		$('#toggle-switch').removeClass('on').addClass('on');
		 resetValues();
		
		
		});
		
		
// hide calendar view on widow rezied		
		  
		  $(window).resize(function(){
			  $('.large-calendar').css('display','none');
			  $('.list-view').css('display', 'block');
			  $('#toggle-switch').removeClass('on');
			  
			  }); 
});  //end document ready


Code if needed to run on ie8
$('.fixed-side').css("width","25%");
$('.fixed-side').css("height","500px");


</script>

?>