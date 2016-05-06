$(document).ready(function(){
/* -------------------------------*/



	var liWidth = $(window).width(),
		liHeight = $(window).height(),
		liCount = $(".slider li").length;
	//alert(liCount);
	var conWidth = $(".container").outerWidth();
	var ulWidth = (liWidth * liCount);
	var sliderValue = 1;
	
	$(".slider li").css({
		'width':liWidth+'px',
		'height':liHeight+'px'
	});
	$(".slider").css('width',ulWidth + 'px');

	$(".left").click(function(e){  /* next */
		e.preventDefault();
		setTimeout(function(){
			$(".slider").animate({"margin-left":"-"+liWidth},function(){
				$(".slider").css('margin-left','0px');
				$(this).find("li:first").appendTo(".slider");
			});
		},400);
	});

	//$(".slider").css('margin-left','-'+liWidth);
	$(".right").click(function(e){ /* prev */
		e.preventDefault();
		setTimeout(function(){
			$(".slider").css('margin-left',"-"+liWidth+"px");
			$(".slider").find("li:last").prependTo(".slider");
			$(".slider").animate({'margin-left':'0px'});
		},400);
	});

	var autoSlider = setInterval(function(){
		$(".slider").animate({"margin-left":"-"+liWidth},function(){
			$(".slider").css('margin-left','0px');
			$(this).find("li:first").appendTo(".slider");
		});
	},2500);


	$(window).resize(function(){
			var liWidth = $(window).width(),
				liHeight = $(window).height(),
				liCount = $(".slider li").length;
			//alert(liCount);
			var conWidth = $(".container").outerWidth();
			var ulWidth = (liWidth * liCount);

			$(".slider li").css({
				'width':liWidth+'px',
				'height':liHeight+'px'
			});
			$(".slider").css('width',ulWidth + 'px');
	});
	

	



/* -------------------------------*/

});