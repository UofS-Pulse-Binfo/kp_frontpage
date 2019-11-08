(function ($) {
  Drupal.behaviors.KPFrontpage = {
    attach: function (context, settings) {

      /**
       Quick Access Updates while site-wide search in development.
       SEARCH BOX
      **/
      // Clear form entry for ease of typing strings.
      /*
      $('#kpfrontpage-copy-quickstart-searchbox')
      .focus(function() {
        $(this).val('');
      })
      .focusout(function() {
        if ($(this).val() == '') {
          $(this).val('Search KnowPulse: CDC Redberry or AGILE Eperiment...');
        }
      });
      */

      /**
       Quick Access Updates while site-wide search in development.
       LINKS
      **/
      $('.kpfrontpage-link-slide a').click(function(e) {
        e.preventDefault();
        // Stop scroll just about where the DATA heading is.
        // When page is reduced, make the link go to specific data section.
        var contentWrapper = $('#kpfrontpage-copy').width();
        var stopAt = (contentWrapper == 850) ? $('#data-' + e.target.id) : $('#kpfrontpage-copy-explore-data-data');

        if (stopAt.length) {
          $('html, body').stop().animate({
            scrollTop: (stopAt.offset().top)
          }, 700);
        }
      });

      // Delay events from firing so as not to become overly sensitive.
      var d;

      // CONTROL PANEL AND DROP MENU:
      // Raw Phenotypes, context menu.
      $('.kpfrontpage-popupwindow-element').bind('mouseenter click', function() {
        var element = $(this);

        // Start with a non timer in case it was set previously
        if (d) {
          clearTimeout(d);
          d = null;
        }

        d = setTimeout(function() {
          element.find('.kpfrontpage-popupwindow').fadeIn(300);

          element.mouseleave(function() {
            clearTimeout(d);
            element.find('.kpfrontpage-popupwindow').fadeOut(300);
          });
        }, 400);
      });

      // Listen to main menu items, allow to go back to main selection.
      $('#kpfrontpage-copy-summary-menu ul li').click(function(e) {
        var mainMenu = $(this).parent();
        var speed = 100;

        mainMenu.slideUp(speed);
        $('#block-' + e.target.id).slideDown(speed);

        $('#block-' + e.target.id + ' h2').click(function() {
          $('#block-' + e.target.id).slideUp(speed);
          mainMenu.slideDown(speed);
        })
      });


      // CROPS:
      $('#kpfrontpage-copy-explore-data-crops td').bind('mouseenter', function() {
        var element = $(this);

        // Start with a non timer in case it was set previously
        if (d) {
          clearTimeout(d);
          d = null;
        }

        d = setTimeout(function() {
          element.find('div').slideDown(100);
          fade(element.parent(), 'img', element.index(), false);
        }, 400);

        element.mouseleave(function() {
          clearTimeout(d);
          element.find('div').slideUp(100);
          fade(element.parent(), 'img', element.index(), true);
        });
      });


      // TOOLS:
      $('#kpfrontpage-copy-explore-data-tools li').bind('mouseenter', function() {
        var element = $(this);
        var altText = element.find('img').attr('alt');

        var remoteWindow = $('#kpfrontpage-popupwindow-remote-window');
        remoteWindow.find('div').text(altText).show();

        element.mouseout(function() {
          remoteWindow.find('div').text('').hide();
        });
      });

      // Expose more tools option.
      $('#kpfrontpage-copy-explore-data-tools > a').click(function(e) {
        e.preventDefault();
        $('#kpfrontpage-copy-explore-data-tools ul').fadeIn();
      });

      // Link a.
      $('#kpfrontpage-copy-explore-data-tools ul li').click(function() {
        var loc = $(this).find('a').attr('href');
        window.location.href = loc;
      });

      // When list of of tools becomes more than 3 (sets of 6) the first 2 rows are visible,
      // and the rest becomes hidden. In case there's a 3rd or 4th row provide a link to reveal.
      if ($('#kpfrontpage-copy-explore-data-tools ul').length > 2) {
        $('#kpfrontpage-copy-explore-data-tools > a').css('visibility', 'visible');
      }
      else {
        $('#kpfrontpage-copy-explore-data-tools > a').css('visibility', 'hidden');
      }


      // NEWS, UPDATES, UPCOMING EVENTS SLIDESHOW:
      // Select first bullet.
      $('.kpfrontpage-copy-explore-data-entry-bullets div:first-child').addClass('active-bullet');

      // Randomize speed so that news initializes ahead of events and vice-versa.
      var s = [5000, 6000];
      var speed = Math.floor(Math.random() * Math.floor(2));
      var altSpeed = (speed == 1) ? 0 : 1;

      // Slideshow 1 - News and Updates:
      var slide1 = {};
        slide1.id = 'kpfrontpage-copy-explore-data-extra-news';
        slide1.ctr = 1;
        slide1.len = liSize(slide1.id);

      $('#' + slide1.id + ' li:first-child').show();

      if (slide1.len >= 2) {
        // Start autoslider only when there are at least 2 slides.
        var s1 = setInterval(function() {
          slide(slide1.id, slide1.ctr);
          slide1.ctr++;

          if (slide1.ctr >= slide1.len) {
            slide1.ctr = 0;
          }
        }, s[speed]);
      }

      // Slideshow 2 - Upcoming Events:
      var slide2 = {};
        slide2.id = 'kpfrontpage-copy-explore-data-extra-events';
        slide2.ctr = 1;
        slide2.len = liSize(slide2.id);

      $('#' + slide2.id + ' li:first-child').show();

      if (slide2.len >= 2) {
        // Start autoslider only when there are at least 2 slides.
        var s2 = setInterval(function() {
          slide(slide2.id, slide2.ctr);
          slide2.ctr++;

          if (slide2.ctr >= slide2.len) {
            slide2.ctr = 0;
          }
        }, s[altSpeed]);
      }

      // Attach listener to bullets
      $('.kpfrontpage-copy-explore-data-entry-bullets div').click(function() {
        // News or Events container.
        var parent = $(this).parent().parent().attr('id');
        // Which slide.
        var liNo = $(this).index();

        slide(parent, liNo);

        // Stop autoslide when user wants to move slides via the bullets.
        if (s1) {
          clearInterval(s1);
        }

        if (s2) {
          clearInterval(s2);
        }
      });



      // FUNCTIONS:

      /**
       * Function: Inspect if element exists
       * @param element
       *   String, id attribute of an element.
       * @return boolean
       *   1 True if element exists and 0 False.
       */
      function exists(elementId) {
        return $(elementId).length ? 1 : 0;
      }

      /**
       * Function: Apply fade effect to descendants given a parent id.
       * @param element
       *   String, the id attribute of the parent element.
       * @param type
       *   String, element type ie. td, li.
       * @param except
       *   Integer, index number of element in a given parent where the effect will not apply.
       * @param reset
       *   Boolean, true apply effect, false revert.
       */
      function fade(element, type, except, reset) {
        element.find(type).each(function(i) {
          if (i == except || reset) {
            // Skip this element.
            $(this).css('opacity', 1);
          }
          else {
            // Fade the rest.
            $(this).fadeTo(1, 0.2);
          }
        });
      }

      /**
       * Function: Load next or previous slide.
       *
       * @parem parent
       *   String, Id attribute of the parent container (News or Events).
       * @param go
       *   Integer, index number of an element (slide) to load.
       */
      function slide(parent, go) {
        var currentSlide = activeSlide(parent);

        var loadLi = 0;
        loadLi = go;

        // Select corresponding bullet.
        $('#' + parent + ' .kpfrontpage-copy-explore-data-entry-bullets')
          .find('div.active-bullet').removeClass();
        $('#' + parent + ' .kpfrontpage-copy-explore-data-entry-bullets')
          .find('div').eq(loadLi).addClass('active-bullet');

        // Switch slides.
        $('#' + parent + ' .kpfrontpage-copy-explore-data-entry ul li').eq(currentSlide).hide();
        $('#' + parent + ' .kpfrontpage-copy-explore-data-entry ul li').eq(loadLi).fadeIn(800);
      }

      /**
       * Function: Determine the current active slide, slide that is shown.
       * Tagged with class active-bullet.
       *
       * @param parent
       *   String, Id attribute of the parent container (News or Events).
       */
      function activeSlide(parent) {
        var size = liSize(parent) - 1;

        for(var i = 0; i <= size; i++) {
          if ($('#' + parent + ' ul li').eq(i).is(':visible')) {
            return +i;
          }
        }
      }

      /**
       * Function: Return the number of slides in a given parent container.
       *
       * @param parent
       *   String, Id attribute of the parent container (News or Events).
       */
      function liSize(parent) {
        return $('#' + parent + ' li').length;
      }
    }
 };
})(jQuery);
