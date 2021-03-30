// JavaScript Document

(function($) {
  Drupal.behaviors.kpPages = {
    attach: function (context, settings) {
      // Scroll to sections.
      // Animate scroll to sections by clicking explore sections link/bullet.
      $('#kp-explore-sections .kp-scroll').click(function() {
        var sectionId = $(this).attr('id') + '-section';
        $('html, body').animate({scrollTop: $('.' + sectionId).offset().top }, 700);
      });


      // Tool tip text window.
      var popWindow = $('#kp-pop-window');
      var x = 150;
      var d;
      var tip;

      $('.kp-window-on').bind('mouseenter', function(e) {
        e.preventDefault();

        if (d) {
          clearTimeout(d);
          d = null;
        }

        var element = $(this);
        var pos = element.offset();
        var offset;

        // Which orientation the tip of the tip points to.
        if (element.hasClass('kp-tip-top') == true) {
          tip = 'kp-pop-window-tip-top';
          offset = Math.round(pos.top) + 40;
        }
        else {
          tip = 'kp-pop-window-tip-bottom';
          offset = Math.round(pos.top) - 200;
        }

        var pw  = popWindow.width();
        var fw  = element.width();

        d = setTimeout(function() {
          var dataText = element.attr('data-text');
          var txt = dataText.split('#');
          var popText;

          if (txt[1]) {
            // Highlighted text plus sub text.
            var additionalInfo = (txt[2]) ? '<br /><i>' + txt[2] + '</i>' : '';
            popText = '<h4>' + txt[0] + '</h4>' + '<i>' + txt[1] + '</i>' + additionalInfo;
          }
          else {
            // All text no formatting.
            popText = txt[0];
          }

          popWindow
            .text('')
            .fadeIn(x)
            .addClass(tip)
            .css({
              'top'  : offset,
              'left' : Math.round(pos.left) - (pw - fw) / 2 - 15
            })
            .html(popText);

          // Apply bullets.
          element.parent().find('div').remove('#kp-bullet-team');
          element.parent().find('div')
            .append('<div id="kp-bullet-team" class="kp-green-round-bullet">&nbsp;</div>');

          $('#kp-all-principles').fadeOut(x).fadeIn();
        }, 500);
      })
      .mouseleave(function() {
        clearTimeout(d);
        popWindow.removeClass(tip).fadeOut(x);
        $(this).parent().find('div').html('');
      });


      // Launch modal window. Explain badges.
      $('.kp-launch-window').click(function() {
        popWindow.hide();
        $('#kp-window-blanket').show();
        $('.kp-window').fadeIn(x);
      });

      $('#kp-window-blanket').click(function() {
        $(this).hide();
        $('.kp-window').hide();
      });

      $('.kp-window span').click(function() {
        $('#kp-window-blanket').hide();
        $('.kp-window').hide();
      });


      // Slideshow testimonials.
      if ($('#kp-section-testimonials')) {
        var testimonials = $('#kp-section-testimonials ul li');

        // Load first slide right away.
        testimonials.eq(0).fadeIn('fast');
        var slideCount = testimonials.length;

        $('#kp-slide-right, #kp-slide-left').click(function(e) {
          e.preventDefault();

          var id = $(this).attr('id');
          var slideActive = activeSlide(testimonials);
          var slideLoad;

          if (id == 'kp-slide-right') {
            slideLoad = (slideActive == slideCount - 1 ? 0 : (slideActive + 1));
          }
          else {
            slideLoad = (slideActive == 0 ? slideCount - 1 : (slideActive - 1));
          }

          testimonials.eq(slideActive).hide();
          testimonials.eq(slideLoad).fadeIn(x);

          $('#kp-slide-bullets ul').find('li.kp-active-bullet').removeClass();
          $('#kp-slide-bullets ul li').eq(slideLoad).addClass('kp-active-bullet');
        });
      }


      // Grind cogs in technology ecosystem.
      if ($('#kp-applications-cycle')) {
        var img = $('#kp-applications-cycle');
        var src = img.attr('src');

        img
          .mouseenter(function() {
            $(this).attr('src', src.replace('jpg', 'gif'));
          })
          .mouseleave(function() {
            $(this).attr('src', src.replace('gif', 'jpg'));
          });
      }


      // Knowledge-based search.
      if ($('#kp-section-knowledge-based')) {
        // Result table.
        var searchTable = $('#kp-section-knowledge-based table');
        // Clear search box field.
        var clearSearchBox = $('#kp-clear-search-box');
        // Search box field.
        var searchField = $('#kp-search-box');

        // Load top 5 topics.
        var initialResult = [0, 1, 2, 3, 4];
        renderResult(initialResult);

        // Clear search field.
        if (clearSearchBox) {
          clearSearchBox.click(function(e) {
            e.preventDefault();

            searchField.val('Ask a question');
            renderResult(initialResult);
            $(this).fadeOut();
          });
        }

        // Seach field selected, set value to empty,
        // or back to initial state.
        searchField.focus(function() {
          if (this.value == 'Ask a question') {
            this.value = '';
          }
        })
        .blur(function() {
          if (this.value.trim() == '') {
            this.value = 'Ask a question';
            clearSearchBox.fadeOut();
            renderResult(initialResult);
          }
        })
        .click(function() {
          this.select();
        });

        // Create an array of questions as
        // the basis for the search.
        var topics = new Array();
        searchTable.find('tr').each(function(i) {
          var title = $(this).find('td').eq(0).text();
          topics[i] = title;
        });

        // Query the array for match.
        // As user types, at pause, query.
        var s = null;

        searchField.keyup(function(e) {
          clearTimeout(s);
          // Make clear button available.
          clearSearchBox.fadeIn();

          if (searchField.val()) {
            s = setTimeout(function() {
              // Find all index with the keywords.
              var found = new Array();

              for (var i = 0; i < topics.length; i++) {
                if (topics[i].toLowerCase().indexOf(searchField.val().toLowerCase()) > -1) {
                  found[i] = i;
                }
              }

              renderResult(found);
            }, 1000);
          }
        });
      }

      // Back to top page.
      var backTop = $('#kp-backtop');

      $(window).scroll(function() {
        // Past 1300px vertical position, begin showing option to go back to top.
        var offset = 1300;

        if ($(this).scrollTop() > offset) {
          // Show back to top.
          backTop.fadeIn();
        }
        else {
          backTop.fadeOut();
        }

        backTop.click(function() {
          $('html, body').stop().animate({scrollTop: 0}, 'slow');
          return false;
        });
      });

      // Switch tools overview and tools showcase.
      $('.kp-switch').click(function() {
        var switchId = $(this).attr('id');

        if (switchId == 'kp-switch-overview') {
          // Load overview, hide showcase 
          $('#kp-tools-info').show();
          $('#kp-tools-showcase').hide();

          $('#' + switchId)
            .removeClass('kp-standard-switch kp-switch-standard')          
            .addClass('kp-active-switch kp-switch-active');
          
          $('#kp-switch-showcase')
            .removeClass('kp-active-switch kp-switch-active')
            .addClass('kp-standard-switch kp-switch-standard') ;
        }
        else {
          // Load showcase, hide overview.
          $('#kp-tools-info').hide();
          $('#kp-tools-showcase').show();          

          $('#' + switchId)
            .removeClass('kp-standard-switch kp-switch-standard')
            .addClass('kp-active-switch kp-switch-active');
        
          $('#kp-switch-overview')
            .removeClass('kp-active-switch kp-switch-active')
            .addClass('kp-standard-switch kp-switch-standard');
        }
      });


      // Function:


      /**
       * Update table showing all matching topics.
       *
       * @param indexSet
       *   An array of index number corresponding to an element/item in the topics table.
       */
      function renderResult(indexSet) {
        searchTable.find('tr').fadeOut();

        $.each(indexSet, function(i, v) {
          searchTable.find('tr').eq(i).fadeIn();
        });

        searchTable.parent().find('small').eq(0).text('We found ' + indexSet.length + ' results:');
      }

      /**
       * Find the active or current slide in slider element.
       *
       * @param element
       *   Reference to parent element containing slides (elements).
       */
      function activeSlide(element) {
        for(var i = 0; i < slideCount; i++) {
          if (element.eq(i).is(':visible')) {
            return i;
          }
        }
      }
}}} (jQuery));
