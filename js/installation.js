/**
 * @file
 * Behaviors for the Uber publisher profile installation.
 */

(function ($, _, Drupal, drupalSettings) {
  'use strict';
  Drupal.behaviors.search = {
    attach: function (context) {
      $('#install-select-language-form #edit-langcode').on('change', function () {
        var languages = ['ar', 'en'];
        if(jQuery.inArray($(this).val(), languages) == -1) {
          $('.other-lang-warn').addClass('visible');
        }
        else {
          $('.other-lang-warn').removeClass('visible');
        }
      });
    }
  };
})(window.jQuery, window._, window.Drupal, window.drupalSettings);
