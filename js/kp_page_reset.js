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

      // Disable system styles.
      var is_logged_in = Drupal.settings.kp_frontpage.is_logged_in;
      var stylesheet_id = (is_logged_in) ? 4 : 3;

      var stylesheet = document.styleSheets[ stylesheet_id ];
      stylesheet.disabled = true;

      // Disable admin navigation menu. This is the last attempt
      // since Drupal seems to drop it and sometimes not despite
      // exception set in structure/block.
      if ($('#admin-menu')) {
        $('#admin-menu').hide();
      }

}}} (jQuery));
