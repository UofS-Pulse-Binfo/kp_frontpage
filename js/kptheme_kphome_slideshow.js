(function ($) {
  Drupal.behaviors.KPSlideshow = {
    attach: function (context, settings) {
      var speed = 1200;

      // Initialize auto loop slider vars.
      var i = 0;
      // Main slideshow count slides
      var mSlides = $('#main-slideshow ul:first-child li').length;

      var moreInfo = $('#stat-more-info');
      $('#btn-more-info')
      .mouseover(function(){
        moreInfo.show();
      })
      .mouseout(function() {
        moreInfo.hide();
      });


      // Load first slide right away.
      $('#main-slideshow ul:first-child li').eq(0).fadeIn('fast');
      $('#footer-slideshow-project ul:first-child li').eq(0).fadeIn('fast');
      $('#footer-slideshow-publication ul:first-child li').eq(0).fadeIn('fast');

      // Select first bullet.
      $('.bullets li:first-child').addClass('active-bullet');

      // Start slider.
      var int = self.setInterval(autoSlider, speed * 5);

      function autoSlider() {
        // Since the first slide (index 0) is active already,
        // start at 1 - next slide.
        if (i == 0) {
          i = 1;
        }

        // When last slide is reached, start at first slide (index 0).
        if (i == mSlides) {
          i = 0;
        }

        // When main slideshow container size is less than 1372px
        // do not initiate auto slide.
        if ($('#main-slideshow-container').width() < 1300) {
          stopSlider();
          return;
        }

        // Slide...
        slide('main-slideshow', i);
        i++;
      }

      // Attach listener to right and left link.
      $('.chevron-right, .chevron-left').click(function() {
        // Parent div id containing the prev and next link clicked.
        var parentId = $(this).parent().attr('id');

        if (parentId == 'main-slideshow') {
          // Stop slide when user interacts with the main slider.
          stopSlider();
        }

        var lnkClass = $(this).attr('class');
        // Move next or prev based on the link clicked.
        var go = (lnkClass.indexOf('right') == -1) ? 'left' : 'right';

        // Slide...
        slide(parentId, go);
      });

      // Attach listener to bullets
      $('.bullets li').click(function() {
        var parentId = $(this).parent().prev('div').attr('id');

        if (parentId == 'main-slideshow') {
          // Stop slide when user interacts with the main slider.
          stopSlider();
        }

        var liNo = $(this).index();

        // Slide...
        slide(parentId, liNo);
      });

      // Attach listener to main slideshow
      $('#main-slideshow').mouseover(stopSlider);

      // Function to load next or previous slide.
      function slide(parent, go) {
        var currentSlide = activeSlide(parent);
        var size = liSize(parent) - 1;
        var loadLi = 0;

        if (go == 'right') {
          loadLi = (currentSlide == size ? 0 : (currentSlide + 1));
        }
        else if (go == 'left') {
          loadLi = (currentSlide == 0 ? size : (currentSlide - 1));
        }
        else {
          loadLi = go;
        }

        // Select corresponding bullet.
        $('#' + parent).next('ul').find('li.active-bullet').removeClass();
        $('#' + parent).next('ul').find('li').eq(loadLi).addClass('active-bullet');

        // Switch slides.
        $('#' + parent + ' .slideshow-slide').eq(currentSlide).hide();
        $('#' + parent + ' .slideshow-slide').eq(loadLi).fadeIn(speed);
      }


      // Function to find the active slide.
      function activeSlide(parent) {
        var size = liSize(parent) - 1;

        for(var i = 0; i <= size; i++) {
          if ($('#' + parent + ' .slideshow-slide').eq(i).is(':visible')) {
            return +i;
          }
        }
      }


      // Function to return the number of rows in a given parent container
      function liSize(parent) {
        return $('#' + parent + ' .slideshow-slide').length;
      }


      // Stop auto slider
      function stopSlider() {
        int = window.clearInterval(int);
      }
    }
  };
})(jQuery);
