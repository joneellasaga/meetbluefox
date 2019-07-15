/*
* FlowType.JS v1.1
* Copyright 2013-2014, Simple Focus http://simplefocus.com/
*
* FlowType.JS by Simple Focus (http://simplefocus.com/)
* is licensed under the MIT License. Read a copy of the
* license in the LICENSE.txt file or at
* http://choosealicense.com/licenses/mit
*
* Thanks to Giovanni Difeterici (http://www.gdifeterici.com/)
*/

(function($) {
   $.fn.flowtype = function(options) {

// Establish default settings/variables
// ====================================
      var settings = $.extend({
         maximum   : 9999,
         minimum   : 1,
         maxFont   : 9999,
         minFont   : 1,
         fontRatio : 5
      }, options),

// Do the magic math
// =================

//custom compression formula 
//compression = max width - current width / 5;

//old formula
//getSize = $el.css('font-size'),
//fontRatio = elw / parseInt(elw.toString().substring(0, 3)),
//fontBase = parseInt(getSize.substring(0, 3)) - fontRatio,

      changes = function(el) {
         var $el = $(el),    
                  elw = window.innerWidth,
			width = settings.maximum,
                  compressRatio = (width - elw) / settings.fontRatio,
                  fontBase = settings.maxFont - Math.round(compressRatio),                  
                  fontSize = 	fontBase > settings.maxFont ? settings.maxFont : fontBase < settings.minFont ? settings.minFont : fontBase;                     
         $el.css('font-size', fontSize + 'px');
 
      },

      isInteger = function(x) {
            return x % 1 === 0;
      };

// Make the magic visible
// ======================
      return this.each(function() {
      // Context for resize callback
         var that = this;
      // Make changes upon resize
         $(window).resize(function(){changes(that);});
      // Set changes on load
         changes(this);
      });
   };
}(jQuery));