(function($) {

	$( document ).ready(function() {

    //
    //  RESIZE ABOVE FOLD CONTENT TO BE FULL WINDOW HEIGHT
    //

    var homeVideo = $('#homeVideo');
    var propertyFold = $('#propertyFold');
    var discoverFold = $('#discoverFold');
    var experienceFold = $('#experienceFold');
    var mapFold = $('#map_wrapper');
		var windowHeight = $(window).height();

    if ( $(window).width() > 550 ) { 
    	if ( homeVideo.height() > 0 ) {
  			var newHeight = windowHeight - $('#masthead').outerHeight(true) - $('#colophon').outerHeight(true);
  			homeVideo.css('height', newHeight);
    	} else {
        $('#homeVideo article').appendTo('#main');
      }
    }

    if (propertyFold.length > 0 ) {
      if ( $(window).width() >= 1024 && $(window).width() <= 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 20;
        propertyFold.css('height', newHeight);
      } else if ( $(window).width() > 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 30;
        propertyFold.css('height', newHeight);
      } else {
        $('.top-details').insertBefore('#navSpace');
      }
    }

    if (discoverFold.length > 0 ) {
      if ( $(window).width() >= 1024 && $(window).width() <= 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 20;
        discoverFold.css('height', newHeight);
      } else if ( $(window).width() > 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 30;
        discoverFold.css('height', newHeight);
      } else {
        $('.top-details').insertBefore('#navSpace');
      }
    }

    if (experienceFold.length > 0 ) {
      if ( $(window).width() >= 1024 && $(window).width() <= 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 20;
        experienceFold.css('height', newHeight);
      } else if ( $(window).width() > 1200 ) {
        var newHeight = windowHeight - $('#masthead').outerHeight(true) - 30;
        experienceFold.css('height', newHeight);
      } else {
        $('.top-details').insertBefore('#navSpace');
      }
    }

    if (mapFold.length > 0 ) {
      var newHeight = windowHeight - 60 // For 2colspacing;
      mapFold.css('height', newHeight);

        // This if for possition FIXED on scroll
        mapTop = mapFold.offset().top;

        $(window).scroll(function() {

          var windowTop = $(window).scrollTop() + 60; // because of the colspace top set

          if (windowTop > mapTop) {
            mapFold.addClass('fixed');
          } else {
            mapFold.removeClass('fixed');
          }
        });
    }
    

    //
    //  GALLERY & FLOORPLAN SLIDER ON PROPERTY PAGE
    //

    featureSlideshow = $('#featureSlideshow');
  	
  	if ( featureSlideshow.length > 0 ) {
		  $(featureSlideshow).slick({
		  	draggable: false,
		  	dots: false,
        speed: 500,
        autoplaySpeed: 2000,
		  	arrows: true,
		  	autoplay: true,
		  	appendArrows: $('.fold'),
        infinite: true
		  });
  	}

    floorplanSlideshow = $('#floorplanSlideshow');

    if ( floorplanSlideshow.length > 0 ) {
      floorplanSlideshow.slick({
        arrows: true,
        autoplay: false,
        infinite: true
      });
    }

    // About us page move quote half way up.
    var quoteHeight = $('.quote-container').outerHeight();

    if( quoteHeight > 0 ) {
      $('.quote-container').css('margin-top', -quoteHeight/2);
    }


    var fullSlideshow = $('#featureSlideshow .slick-track');

    if (fullSlideshow.height() > 0 ) {
      var newHeight = windowHeight - $('#masthead').outerHeight(true) - 30;
      fullSlideshow.css('height', newHeight);
    }

    // Set all slides to same height
    $('#featureSlideshow').on('setPosition', function () {
      jbResizeSlider();
    });

    //we need to maintain a set height when a resize event occurs.
    //Some events will through a resize trigger: $(window).trigger('resize');
    $(window).on('resize', function(e) {
      jbResizeSlider();
    });

    //since multiple events can trigger a slider adjustment, we will control that adjustment here
    function jbResizeSlider(){
      $slickSlider = $('#featureSlideshow');
      $slickSlider.find('.slick-slide').height('auto');

      var slickTrack = $slickSlider.find('.slick-track');
      var slickTrackHeight = $(slickTrack).height();

      $slickSlider.find('.slick-slide').css('height', slickTrackHeight + 'px');
    }

    //
    //  SCROLLING NAV ON PROPERTY PAGE
    //

    bookingNav = $('#bookingNav');

  	if ( bookingNav.height() > 0 ) {

      navHeight = $('#bookingNav').outerHeight(true);
      navSpace = $('#navSpace');

      // Global declare so not logging every scroll
      navTop = $('#bookingNav').offset().top;

  		$(window).scroll(function() {

  			var windowTop = $(window).scrollTop();

  			if (windowTop > navTop) {
  				bookingNav.addClass('fixed');
  				navSpace.css('height', navHeight);
  			} else {
  				bookingNav.removeClass('fixed');
  			}

  		});
  	}

    //
    //  SMOOTH SCROLLING TO INTERNAL LINKS
    //  ALSO CONTACT FORM POPUP
    //

    $('a[href^="#"]').on('click',function (e) {
      e.preventDefault();

      // If it's #contact - then open modal
      if (this.hash == '#contact') {
        var options = {
            type: "html",
            htmlSelector: "#contact-modal",
        };
        
        $(this).simplePopup(options);

      // Or if this is coming soon modal
      } else if (this.hash == '#coming-soon') {
        var options = {
            type: "html",
            htmlSelector: "#coming-soon-modal",
        };
        
        $(this).simplePopup(options);

      // Or if it's the rates info popup
      } else if (this.hash == '#rates-info') {

        var options = {
            type: "html",
            htmlSelector: "#rates-info",
        };
        
        $(this).simplePopup(options);

      // Or if it's a property video popup
      } else if (this.hash == '#play-video') {

        // Video Trickery

        $("#property-video")[0].src += "&autoplay=1";
        $('.video-hide').fadeOut();
        ev.preventDefault();

      // Otherwise scroll to content
      } else {

        var target = this.hash;
        var $target = $(target);

        $('html, body').stop().animate({
          'scrollTop': $target.offset().top
          }, 900, 'swing', function () {
          window.location.hash = target;
        });

      }
    });


    // Responsive things in here
    if ( $(window).width() < 900 ) {
      var slideout = new Slideout({
        'panel': document.getElementById('page'),
        'menu': document.getElementById('mobile-nav'),
        'padding': 256,
        'tolerance': 70,
        'side': 'right'
      });

      document.querySelector('.menu-toggle').addEventListener('click', function() {
        slideout.toggle();
      });
    }

	});

})(jQuery);
