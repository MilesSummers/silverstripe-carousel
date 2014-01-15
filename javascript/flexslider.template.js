$(document).ready(function(){
  $('.flexslider').flexslider({
	slideshow: $auto,
    animation: "$transition",
    animationLoop: true,
    slideshowSpeed: $pause,
	animationSpeed: $speed,
	pauseOnHover: true,
	controlNav: $pager, 
	directionNav: $controls,
	maxItems: 1
  });
});
