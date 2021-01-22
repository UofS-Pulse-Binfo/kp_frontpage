// JavaScript Document

(function($) {
  Drupal.behaviors.kpPageReset = {
    attach: function (context, settings) {
      // Reset code.
      // Create a blank page.
      $('div#skip-link, div.region')
        .remove();

      $('body')
        .removeClass()
        .removeAttr('class')
        .removeAttr('style');

      // Default drupal page is practically black canvas.
      // Pour white paint.
      $('body').css({'background-color': '#FFFFFF', 'margin': '0', 'padding' : '0'});

      // Page is too slow to load, show animation.
      $('body').prepend('<div id="kp-wait">loading page, please wait...</div>');
      $(document).ready(function() {
        $('#kp-wait').fadeOut('fast').remove();
      });
}}} (jQuery));
