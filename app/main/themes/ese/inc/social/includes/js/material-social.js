jQuery(document).ready(function($){
	$('.material-social').on('click', function() { 
	  var hidden = $(".social-btn").css("display") == "none";
	  if (hidden) {
	    $(".social-btn").slideDown(500).css("display", "inline-block");
	  } else {
	    $(".social-btn").slideUp(500);
	  }
	});

});