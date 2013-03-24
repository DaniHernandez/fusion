$(function() {
	/*	CarouFredSel: a circular, responsive jQuery carousel.
		Configuration created by the "Configuration Robot"
		at caroufredsel.dev7studios.com
	*/
	autoAlto();
	
	$("#vertical-carousel").carouFredSel({
		direction: "down",
		height: "100%",
		items: {
			start: "random",
			width: 210,
			height: 210,
			visible: (($('#vcarousel-container').height() / 200) -0.5)
		},
		scroll: {
			items: 1,
			pauseOnHover: 'inmediate-resume',
			fx: "scroll",
			duration: 1000,
		},
		auto: {
			delay: 4000
		},
		mousewheel: {
			duration: 500,
		}
	});

	$("#horizontal-carousel").carouFredSel({
		direction: "right",
		height: 'auto',
		width: "95%",
		items: {
			width: 120,
			height: 120,
			visible: null,
		},
		scroll: {
			items: 2,
			pauseOnHover: 'inmediate-resume',
		},
		mousewheel: {
			items: 1,
			duration: 250
		}
	});	
});

$(window).resize(autoAlto);

function autoAlto(){
	var naltura=$(".span9").height() - 50;
	$("#vcarousel-container").css("height", naltura);
}

