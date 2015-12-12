	
	
	<footer>
	
 	
		<div class="container footer">
			<div class="row">
			<ul>		 
						<li><a href="index.php">Home</a></li>
				    	<li><a href="contact.php">  My Skills  </a></li>
				    	<li><a href="about.php"> About Me</a></li>
				    	<li><a href="portfollio.php"> Portfollio</a></li>
				    	
				    
				  	</ul>
				  	<div class="clear"></div>
			
				
			<p>Copyright &copy; <? echo date('Y'); ?> Vanessa Henson </p>
			</div>
		</div>

		<div class="clear"></div>
	</footer>
	
	    <script>
   $(document).ready(function(){
    
   $('.lightbox').nivoLightbox({
   
   
   effect: 'fade',                             // The effect to use when showing the lightbox
    keyboardNav: true,                          // Enable/Disable keyboard navigation (left/right/escape)
    clickOverlayToClose: true,                  // If false clicking the "close" button will be the only way to close the lightbox
    errorMessage: 'The requested content cannot be loaded. Please try again later.' // Error message when content can't be loaded
});
   
   
$('.slidePhoto').click(function(){

	$(this).next('.slideText').slideToggle();
})
   
    
   
  $('.wiggle img').click(function(){
   			$(this).next('div').toggle('slow');
   
   }); 
     $('.tips').click(function(){
   			$(this).hide('slow');
   
   }); 
      $('.tips2').click(function(){
   			$(this).hide('slow');
   
   }); 
   
      $('.tips3').click(function(){
   			$(this).hide('slow');
   
   }); 
   
  
   
   $('li h2.graphics').click(function(){
   $('li').removeClass('current');
   $('li.graphics').addClass('current');
   $('.middleGraphics, .middlePhotos, .middleWeb').hide();
   	$(' .middleGraphics').toggle();
   
   });
   
	 $('li h2.web').click(function(){
	 $('li').removeClass('current');
	  $('li.web').addClass('current');
	 $('.middleGraphics, .middlePhotos, .middleWeb').hide();
   	$(' .middleWeb').toggle();
   
   });
   
    $('li h2.photos').click(function(){
    $('li').removeClass('current');
     $('li.photos').addClass('current');
    $('.middleGraphics, .middlePhotos, .middleWeb').hide();
   	$(' .middlePhotos').toggle();
   
   });
   
   
   //slider
   
 /*  $('#slider').nivoSlider({
		 effect:'boxRain',
    animSpeed: 1000,
    pauseTime: 5000,
	prevText: " ",
	nextText: " "
	

		});*/

   
  



}); 

</script>
    
	
  </body>
</html>