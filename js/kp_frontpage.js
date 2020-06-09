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
      var slideSize;
      enableContentWrappers(false);

      var selectExperiment = $('#kpfrontpage-experiment-select');
      createExperimentSlider(selectExperiment.val());

      // Even listeners:
      // Experiment and slide left or right clicked .
      document.addEventListener('click', function(e) {
        if (e.target.classList.contains('kpfrontpage-experiment-item')) {
          slideSize = $('#kpfrontpage-list-wrapper > div').length;
          var curSlide = currentSlide();
          setActive(e.target.id, curSlide);
          getExperiment(e.target.id);
        }

        if (e.target.classList.contains('kpfrontpage-slide-nav')) {
          slideSize = $('#kpfrontpage-list-wrapper > div').length;
          var curSlide = currentSlide();

          slideSize -= 1;
          var loadSlide;

          // Disable all lists, then figure out which one to load.
          $('#kpfrontpage-list-' + curSlide).addClass('kpfrontpage-hidden');

          if (e.target.id == 'kpfrontpage-slide-left') {
            loadSlide = (curSlide == 0 ? slideSize : (curSlide - 1));
          }
          else if (e.target.id == 'kpfrontpage-slide-right') {
            loadSlide = (curSlide == slideSize ? 0 : (curSlide + 1));
          }

          // Set an active slide.
          $('#kpfrontpage-list-' + loadSlide).removeClass('kpfrontpage-hidden');
          var initialItem = $('#kpfrontpage-list-' + loadSlide + ' div').eq(0).find('a').attr('id');

          setActive(initialItem, loadSlide);
          getExperiment(initialItem);
        }
      });

      // Genus changed.
      selectExperiment.change(function() {
        enableContentWrappers(false);

        var genus = $(this).val();
        createExperimentSlider(genus);
      });


      /**
       * Find current slide.
       */
      function currentSlide() {
        for(var i = 0; i <= (slideSize - 1); i++) {
          if ($('#kpfrontpage-list-' + i).is(':visible')) {
            return i;
          }
        }
      }

      /**
       * Create experiments slider.
       */
      function createExperimentSlider(genus) {
        var p = Drupal.settings.kp_frontpage.experiment;
        var slideWrapper = $('#kpfrontpage-list-wrapper');

        $.get(p + encodeURI(genus), null, function(response) {
          if (response != 0) {
            // Before adding slides, clear wrapper from previous genus.
            slideWrapper.empty();
            $.each(response, function(i, item) {
              // Show the first slide.
              var display = (i == 0) ? '' : 'kpfrontpage-hidden';
              // Wrapper for slides.
              var wrap = '<div id="kpfrontpage-list-' + i + '" class="kpfrontpage-experiments-list ' + display + '">';
              slideWrapper.append(wrap);

              // Optimal layout wise is 3 experiment per slide.
              $.each(item, function(j, experiment) {
                var activeExperiment = '';

                // Load the experiment profile of the first experiment of a genus.
                if (i == 0 && j == 0) {
                  activeExperiment = '<hr />';
                  getExperiment(experiment.genus + '/' + experiment.id);
                }

                var slide = '<div><a hrefr="#" id="' + experiment.genus + '/' + experiment.id + '" class="kpfrontpage-experiment-item">' + experiment.name + '</a>' + activeExperiment + '</div>';
                $('#kpfrontpage-list-' + i).append(slide);
              });
            });

            enableContentWrappers(true);
          }
        });
      }

      /**
       * Fetch experiment.
       */
      function getExperiment(source) {
        var p = Drupal.settings.kp_frontpage.experiment;

        // Sections.
        var content = {};
        content.logo    = $('#kpfrontpage-summary-logo');
        content.text    = $('#kpfrontpage-summary-text');
        content.funders = $('#kpfrontpage-summary-funders-logo');
        content.link    = $('#kpfrontpage-exeriment-page');

        content.logo.empty();
        content.text.empty();
        content.funders.empty();
        content.link.hide();

        $.get(p + source, 'null', function(response) {
          if (response != 0 && content.text.text().trim().length <= 0) {
            // Clear information content section.
            var title = '<h5>' + response.name + '</h5>';
            content.text.append(title + response.description.trim());

            if (response.projectLogo.length == 1) {
              // No logo found, create a dummy logotype.
              response.projectLogo = '<div class="kpfrontpage-bubble">' + response.projectLogo + '</div>';
            }
            content.logo.append(response.projectLogo);
            content.funders.append(response.funderLogo);

            content.link.attr('href', response.entityId).show();
          }
        });
      }

      /**
       * Set active experiment.
       */
      function setActive(id, curSlide) {
        var slide = $('#kpfrontpage-list-' + curSlide);

        // Drop active experiment highlight.
        slide.find('hr').remove();
        var slideWrap = $('#kpfrontpage-list-' + curSlide + ' div');

        // Attach new highlight to clicked experiment.
        for (var i = 0; i <= slideWrap.length - 1; i++) {
          var matchId = slideWrap.eq(i).find('a').attr('id');

          if (matchId == id) {
            slideWrap.eq(i).append('<hr />');
          }
        }
      }

      /**
       * Hide content wrappers.
       */
      function enableContentWrappers(show = true) {
        // Slider experiment links and left or right slide link
        // and experiment information section.
        var sliderWrapper  = $('#kpfrontpage-experiment-slider');
        var contentWrapper = $('#kpfrontpage-experiment-summary');
        var waitAnimation  = $('#kpfrontpage-wait');

        if (show) {
          sliderWrapper.show();
          contentWrapper.show();
          waitAnimation.hide();
        }
        else {
          sliderWrapper.hide();
          contentWrapper.hide();
          waitAnimation.show();
        }
      }

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
