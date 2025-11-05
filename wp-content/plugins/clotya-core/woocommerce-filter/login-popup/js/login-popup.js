(function ($) {
  "use strict";

	$(document).on('clotyaShopPageInit', function () {
		clotyaThemeModule.popuplogin();
	});

	clotyaThemeModule.popuplogin = function() {
				
      const container = document.querySelector( '.authentication-modal' );
      const button = document.querySelectorAll( '.header-button .login-button' );

      if ( container !== null && button !== null ) {
        const close = container.querySelector( '.site-close' );
        for( var i = 0; i < button.length; i++ ) {
          const self = button[i];

          self.addEventListener( 'click', (e) => {
            e.preventDefault();
            container.classList.add( 'is-active' );
          })
        }

        close.addEventListener( 'click', (e) => {
          e.preventDefault();
          if ( container.classList.contains( 'is-active' ) ) {
            container.classList.remove( 'is-active' );
          }
        })
      }
	  
	}
	
	$(document).ready(function() {
		clotyaThemeModule.popuplogin();
	});

})(jQuery);
