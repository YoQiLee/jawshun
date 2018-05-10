<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<?php $this->display('inc_skin.php',0,'首页'); ?>
<link rel="stylesheet" type="text/css" href="style/style.css">
<link rel="stylesheet" type="text/css" href="style/jquery.simpleslider.css">
</head>
<body>
    <?php $this->display('inc_header.php'); ?>
	<div class="main">
		<div class="advert-banner">
			<div class="slider">
				<div class="slide" id="first">
					<div class="slidecontent">
						<span class="headersur">It's powerful and at the same time a</span>
							<h1>SIMPLE SLIDER</h1>
							<div class="button" onclick="mainslider.nextSlide();">Let me show you how simple</div>
					</div>
				</div>
				<div class="slide" id="second">
					<div class="slidecontent">
						<span class="headersur">It's powerful and at the same time a</span>
							<h1>SIMPLE SLIDER</h1>
							<div class="button" onclick="mainslider.nextSlide();">Let me show you how simple</div>
					</div>
				</div>
			</div>
		</div>
	</div>
    <?php $this->display('inc_footer.php'); ?> 
    <div class="pagebottom"></div>
    <?php $this->display('inc_chat.php'); ?>
</body>
</html>
<script type="text/javascript" src="js/jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/simple-jQuery-slider-master/src/jquery.simpleslider.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		console.info("hello1");

		var options = {
	        slides: '.slide', // The name of a slide in the slidesContainer
	        swipe: false,    // Add possibility to Swipe > note that you have to include touchSwipe for this
	        transition: "slide", // Accepts "slide" and "fade" for a slide or fade transition
	        slideTracker: true, // Add a UL with list items to track the current slide
	        slideTrackerID: 'slideposition', // The name of the UL that tracks the slides
	        slideOnInterval: false, // Slide on interval
	        interval: 9000, // Interval to slide on if slideOnInterval is enabled
	        animateDuration: 1000, // Duration of an animation
	        animationEasing: 'ease', // Accepts: linear ease in out in-out snap easeOutCubic easeInOutCubic easeInCirc easeOutCirc easeInOutCirc easeInExpo easeOutExpo easeInOutExpo easeInQuad easeOutQuad easeInOutQuad easeInQuart easeOutQuart easeInOutQuart easeInQuint easeOutQuint easeInOutQuint easeInSine easeOutSine easeInOutSine easeInBack easeOutBack easeInOutBack
	        pauseOnHover: false, // Pause when user hovers the slide container
	        magneticSwipe: true, // This will attach the slides to the mouse's position when swiping/dragging
	        neverEnding: true // Enable this to create a 'neverending' effect.
	    };
	    $(".slider").simpleSlider(options);
	})

	
</script>