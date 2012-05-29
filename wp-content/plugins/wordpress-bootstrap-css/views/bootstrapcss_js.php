<script type="text/javascript">
	jQuery( document ).ready(
		function () {

			jQuery( 'select[name=hlt_bootstrap_option]' ).on( 'change', onChangeCssBootstrapOption );

			if ( jQuery( '#hlt-twitter' ).is( ':checked' ) === false ) {
				jQuery( '#BootstrapJavascript' ).hide();
				jQuery( '#IncludeResponsiveCss' ).hide();
			}

			if ( jQuery( '#hlt-none' ).is( ':checked' ) === false ) {
				jQuery( '#HotlinkOptionBox' ).show();
			}
			else {
				jQuery( '#HotlinkOptionBox' ).hide();
			}
			
			/**
			 * Enables/Disables the custom CSS text field depending on checkbox
			 */
			var $oCustomCss = jQuery( "input[type=checkbox][name='hlt_bootstrap_option_customcss']" );
			$oCustomCss.on( 'click', onClickCustomCss );
			onClickCustomCss.call( $oCustomCss.get( 0 ) );
			
			/**
			 * Initialise the default states of sections and inputs.
			 */
			jQuery( 'input:checked' ).parents( 'div.option_section' ).addClass( 'active' );

			/**
			 * When the user clicks on a "section", this handler will adjust the radio/checkbox
			 * according to the current value. If the user clicked "section" but actually clicked
			 * on an input field within the section, this normal handler will get called, and the
			 * "section" handler will exit immediately.
			 */
			jQuery( '.option_section' ).on( 'click', onSectionClick );

			/**
			 * When a checkbox, or associated label is clicked, the parent "section" style is updated.
			 */
			jQuery( '.option_section input[type=checkbox],.option_section label' ).on( 'click',
				function ( inoEvent ) {
					var $this = jQuery( this );
					var oParent = $this.parents( 'div.option_section' );

					var oInput = jQuery( 'input[type=checkbox]', oParent );
					if ( oInput.is( ':checked' ) ) {
						oParent.addClass( 'active' );
					}
					else {
						oParent.removeClass( 'active' );
					}
				}
			);

			jQuery( 'input[name=hlt_bootstrap_option_popover_js]' ).on( 'click', onChangePopoverJs );
			
			jQuery( 'select[name=hlt_bootstrap_option]' ).trigger( 'change' );
		}
	);

	function onSectionClick( inoEvent ) {
		/**
		 * Don't manipulate the checkboxes/radios if the actual input or linked-label was
		 * the target of the click.
		 */
		var oDiv = jQuery( inoEvent.currentTarget );
		if ( inoEvent.target.tagName && inoEvent.target.tagName.match( /input|label/i ) ) {
			return true;
		}
				
		var oEl = oDiv.find( 'input[type=checkbox]' );
		if ( oEl.length > 0 ) {
			if ( oEl.is( ':checked' ) ) {
				oEl.removeAttr( 'checked' );
				oDiv.removeClass( 'active' );
			}
			else {
				oEl.attr( 'checked', 'checked' );
				oDiv.addClass( 'active' );
			}
		}

		var oEl = oDiv.find( 'input[type=radio]' );
		if ( oEl.length > 0 && !oEl.is( ':checked' ) ) {
			oEl.attr( 'checked', 'checked' );
			oDiv.addClass( 'active' ).siblings().removeClass( 'active' );
		}

		/**
		 * The onClickCustomCss and onChangePopoverJs requires the live checkbox status in order to determine
		 * the new state of the input field. So we do this after the state has been handled above.
		 */
		var oEl = oDiv.find( 'input[name=hlt_bootstrap_option_customcss]' );
		if ( oEl.length > 0 ) {
			onClickCustomCss.call( oEl.get( 0 ) );
		}
		
		var oEl = oDiv.find( 'input[name=hlt_bootstrap_option_popover_js]' );
		if ( oEl.length > 0 ) {
			onChangePopoverJs.call( oEl.get( 0 ) );
		}
	}

	function onChangeCssBootstrapOption() {
		var sValue = jQuery( this ).val();

		/* Show/Hide Bootstrap Javascript section on Twitter CSS selection */
		if ( sValue == 'twitter' ) {
			jQuery( '#BootstrapJavascript' ).slideDown( 150 );
			
			/**
			 * Handle specific twitter versions.
			 */
			jQuery( '#IncludeResponsiveCss' ).slideDown( 150 );
			jQuery( '#controlAllJavascriptLibraries' ).removeClass( 'hidden' );
			
			/**
			 * Initial the correct state!
			 */
			var fIsIncludeAll = jQuery( '#controlAllJavascriptLibraries' ).find( 'input[type=checkbox]' ).is( ':checked' );
			if ( fIsIncludeAll ) {
				jQuery( '#controlIndividualLibrariesList' ).addClass( 'hidden' );
			}
			else {
				jQuery( '#controlIndividualLibrariesList' ).removeClass( 'hidden' );
			}
			jQuery( '#controlIndividualLibrariesList div[id^=section-hlt-]' ).removeClass( 'hidden' );

			jQuery( '#controlAllJavascriptLibraries' ).unbind( 'click.special' ).bind( 'click.special',
				function () {
					var $oDiv = jQuery( this );
					var $oEl = $oDiv.find( 'input[type=checkbox]' );
					if ( $oEl.is( ':checked' ) ) {
						jQuery( '#controlIndividualLibrariesList' ).addClass( 'hidden' );
					}
					else {
						jQuery( '#controlIndividualLibrariesList' ).removeClass( 'hidden' );
					}
				}
			);
		}
		else {
			jQuery( '#BootstrapJavascript' ).slideUp( 150 );
			jQuery( '#IncludeResponsiveCss' ).slideUp( 150 );
		}

		/* Show/Hide Hotlink section on none/CSS selection */
		if ( sValue == 'none' ) {
			jQuery( '#HotlinkOptionBox' ).slideUp( 150 );
		}
		else {
			jQuery( '#HotlinkOptionBox' ).slideDown( 150 );
		}

		jQuery( '#desc_block .desc' ).addClass( 'hidden' );
		jQuery( '#desc_'+sValue ).removeClass( 'hidden' );
	}

	function onClickCustomCss() {
		if ( jQuery( this ).attr( 'checked' ) ) {
			jQuery( '#hlt-text-customcss-url' ).removeAttr( 'disabled' );
		}
		else {
			jQuery( '#hlt-text-customcss-url' ).attr( 'disabled', 'disabled' );
		}
	}

	function onChangePopoverJs() {
		if ( !jQuery( this ).is( ':checked' ) ) {
			jQuery( 'input[name=hlt_bootstrap_option_tooltip_js]' ).attr( 'checked', 'checked' ).parents( 'div.option_section' ).addClass( 'active' );
		}
	}
</script>