(function(){

  'use strict';

  var MAIN = {

    containers: {},

    init: function(){

      MAIN.initDetectMobileDevice();

    },

    initDetectMobileDevice: function() {

      var device = null;

      var isMobile = {
        Android: function() {
          return navigator.userAgent.match(/Android/i);
        },
        iOS: function() {
          return navigator.userAgent.match(/iPhone|iPad|iPod/i);
        },
        Windows: function() {
          return navigator.userAgent.match(/IEMobile/i) || navigator.userAgent.match(/WPDesktop/i);
        }
      };

      if (isMobile.Android()) {
        device = 'android';
      } else if (isMobile.iOS()) {
        device = 'ios';
      } else if (isMobile.Windows()) {
        device = 'windows-phone';
      } else {
        device = 'desktop';
      }

      if (device != 'desktop') {
        device += ' mobile';
      }

      MAIN.containers.html.addClass(device);
    }

  };

  $(function() {

    $.extend(MAIN.containers, {
      html: $('html'),
      body: $('body')
    });

    MAIN.init();

  });

})();
