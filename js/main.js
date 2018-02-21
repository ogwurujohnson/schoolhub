$(document).ready(function() {

    "use strict";



    // Anchor Smooth Scroll

    $('body').on('click', '.page-scroll', function(event) {

        var $anchor = $(this);

        $('html, body').stop().animate({

            scrollTop: ($($anchor.attr('href')).offset().top - 80)

        }, 1500, 'easeInOutExpo');

        event.preventDefault();

    });



});



$.stellar({

  horizontalOffset: 50,

  verticalOffset: 50,

responsive: true



});



    // Fullwidth Slider

    $('#intro6-slider').flexslider({

        animation: "slide",

        slideshowSpeed: 5000,

        animationSpeed: 1000,

        controlNav: false,

        directionNav: true

    });



    $('.is-prev').on('click', function() {

        $('#intro6-slider').flexslider('prev');

        return false;

    });



    $('.is-next').on('click', function() {

        $('#intro6-slider').flexslider('next');

        return false;

    });



    // Countdown Timer

    var endDate = "August 20, 2016";

    $('.countdown.styled').countdown({

        date: endDate,

        render: function(data) {

            $(this.el).html("<div>" + this.leadingZeros(data.days, 2) + " <span>days</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>hrs</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>sec</span></div>");

        }

    });





// Quote

$('.quote').slick({

  arrows:false,

  dots:true,
  autoplay: true,
  autoplaySpeed: 4000,

});



// Stats 

$('.facts-wrap').appear(function() {

    $('.fact1').animateNumber({ number: 2100 }, 1200);

    $('.fact2').animateNumber({ number: 3800 }, 1200);

    $('.fact3').animateNumber({ number: 50 }, 900);

    $('.fact4').animateNumber({ number: 7000 }, 1300);

}, {

     accX: 0,

     accY: -200

});



// Prettyphoto

$("a[class^='prettyPhoto']").prettyPhoto({

    theme: 'pp_default'

});



// Scrollspy

$('body').scrollspy({

   target: ".navbar",

   offset: 105

});



// Fixed Header

$(window).scroll(function() {

    var value = $(this).scrollTop();

    if (value > 100)

        $(".navbar-default").css("background", "#111").css("padding", "15px 0");

    else

        $(".navbar-default").css("background", "transparent").css("padding", "25px 0");

});



$('.shots').slick({

  centerMode: true,

        arrows: true,

        dots: false,

  slidesToShow: 5,

     prevArrow:"<div class='slick-prev'><i class='fa fa-angle-left'></div>",

      nextArrow:"<div class='slick-next'><i class='fa fa-angle-right'></div>",

  responsive: [

    {

      breakpoint: 769,

      settings: {

        slidesToShow: 3

      }

    },

    {

      breakpoint: 480,

      settings: {

        slidesToShow: 1

      }

    }

  ]

});



// Product Filter

	$(window).load(function() {

	  "use strict";

	var $container = $('.portfolio-grid');

	$container.isotope({

		layoutMode: "masonry",

		masonry: {

			columnWidth: 5

		},

		itemSelector : '.portfolio-item',

		transitionDuration: '0.8s'

	});

	var $optionSets = $('.portfolio-filter'),

		$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){

		var $this = $(this);

		// don't proceed if already selected

		if ( $this.hasClass('active') ) {

			return false;

		}

		var $optionSet = $this.parents('.portfolio-filter');

		$optionSet.find('.active').removeClass('active');

		$this.addClass('active');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }

	var options = {},

		key = $optionSet.attr('data-option-key'),

		value = $this.attr('data-option-value');

		

	// parse 'false' as false boolean

	value = value === 'false' ? false : value;

	options[ key ] = value;

		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

		changeLayoutMode( $this, options );

	} else {

		// otherwise, apply new options

		$container.isotope( options );

	}    

	return false;

	});

});



// Product Filter

	$(window).load(function() {

	  "use strict";

	var $container = $('.blog-masonry');

	$container.isotope({

		layoutMode: "masonry",

		masonry: {

			columnWidth: 5

		},

		itemSelector : '.item',

		transitionDuration: '0.8s'

	});

	var $optionSets = $('.bm-filter'),

		$optionLinks = $optionSets.find('a');

	$optionLinks.click(function(){

		var $this = $(this);

		// don't proceed if already selected

		if ( $this.hasClass('active') ) {

			return false;

		}

		var $optionSet = $this.parents('.bm-filter');

		$optionSet.find('.active').removeClass('active');

		$this.addClass('active');

	// make option object dynamically, i.e. { filter: '.my-filter-class' }

	var options = {},

		key = $optionSet.attr('data-option-key'),

		value = $this.attr('data-option-value');

		

	// parse 'false' as false boolean

	value = value === 'false' ? false : value;

	options[ key ] = value;

		if ( key === 'layoutMode' && typeof changeLayoutMode === 'function' ) {

		changeLayoutMode( $this, options );

	} else {

		// otherwise, apply new options

		$container.isotope( options );

	}    

	return false;

	});

});







