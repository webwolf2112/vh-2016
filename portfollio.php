<? 
$title = "Portfollo of Vanessa Henson";
$nav = "Portfollio";
include('includes/header.php'); ?>

<script>
	$(document).ready(function(){	

		// $(".popover-top").popover({placement:'top'} );	
		setTimeout( function() {

			$(  ".custom-modal" ).fadeIn();

		 }, 500 );

		$( ".custom-modal, .custom-modal .close " ).on( 'click', function() {
			$( this ).fadeOut();
		} );
		
	
	});
</script>
		
	<section class="middleBlack portfollio"> 

	<div class="custom-modal">
		<div>
			<div>
				<p class="close">X</p>
				<p>Click on an Image to find out more Information.</p>
				<p>Click on the Link to vist the client website</p>
			</div>
		</div>
	</div>
		<div class="container "> 
		
			<? include("includes/websites.php") ?>
	 
 
 		<div class="middleWeb">
		   <div class="row">
			  		<div class="col-xs-6 col-sm-4 col-md-3 ">
			  	  		<div class="codeExample">
			  				<a href="https://github.com/webwolf2112/codeExamples" target="blank"><img src="img/postIt.png" alt="Vanessa Henson">
			  				<div class="post-text">
			  					<p class="post-heading">Visit My</p>
			  					<p class="post-body">Git Hub Repo</p>
			  					<div class="line">
			  					<img src="img/line.png" class="img-responsive" alt="vanessa henson">
			  					</div>
			  				</div>
			  				</a>
			  			</div>
			  		</div> 
			  		
			  		<div class="col-xs-6 col-sm-4 col-md-3 ">
			  	  		<div class="codeExample">
			  				<a class="lightbox" href="img/1940sGirlLarge.png" data-lightbox-gallery="gallery1"><img src="img/postItPink.png" alt="Vanessa Henson">
			  				<div class="post-text no-heading">
			  					<p class="post-body">Graphics<br/> Gallery</p>
			  					<div class="line">
			  					<img src="img/line.png" class="img-responsive" alt="vanessa henson">
			  					</div>
			  				</div>
			  				</a>
			  						<!-- gallery links --> 
								<a class="lightbox" href="img/naturalBeautyLarge.png" data-lightbox-gallery="gallery1"></a>
								<a class="lightbox" href="img/steampunkRavenLarge.png" data-lightbox-gallery="gallery1"></a>
							  	<a class="lightbox" href="img/treeLarge.png" data-lightbox-gallery="gallery1"></a>
							   	<a class="lightbox" href="img/layoffShieldLarge.png" data-lightbox-gallery="gallery1"></a>
							   	<a class="lightbox" href="img/yingYang.png" data-lightbox-gallery="gallery1"></a>
							   	<!-- end gallery links -->
			  			</div>
			  		</div>
			  		
			  			<div class="col-xs-6 col-sm-4 col-md-3">
			  	  		<div class="codeExample">
			  				<a class="lightbox" href="img/banners/axiom.png" data-lightbox-gallery="gallery3"><img src="img/postItPink.png" alt="Vanessa Henson">
					  				<div class="post-text no-heading"> 
					  					<p class="post-body">Banners</p> 
					  					<div class="line-height-adjust"> & 
					  					</div>  
					  					<p class="post-body">App Icons</p>
					  					<div class="line">
					  						<img src="img/line.png" class="img-responsive" alt="vanessa henson">
					  					</div>
			  						</div>
			  				</a>
			  				<!-- banner  links -->
								<a class="lightbox" href="img/banners/1.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/2.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/3.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/4.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/5.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/6.png" data-lightbox-gallery="gallery3"></a>
								<a class="lightbox" href="img/banners/7.png" data-lightbox-gallery="gallery3">	</a>
								<a class="lightbox" href="img/banners/katy.png" data-lightbox-gallery="gallery3"></a>
								<!-- end banner  links -->
			  			</div>
			  		</div>

		   </div>
			
				
					</div>
	 </div>
	

  
   	</section> <!-- end middleBlack Section-->
   	
   	<section class="darkerBlue">
		<div>&nbsp;</div><!--important do not remove-->
	<section class="darkBlue logosSmall">
	<div class="container">
	 <h3 id="quote">&quot; We make a living by what we get, but we make a life by what we give &quot; <span class='author'>-Winston Churchill</span></h3> <br/>
	 </div>
	</section>
	<div>&nbsp;</div><!--important do not remove-->
	</section>
   
     
  
 

   
   

<? include('includes/footer.php'); ?>