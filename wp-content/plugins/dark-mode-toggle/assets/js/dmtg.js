( function() {
	'use strict';

	var dmtg = dmtg || {};

	function dmtgDomReady( fn ) {
		if ( typeof fn !== 'function' ) {
			return;
		}

		if ( 'interactive' === document.readyState || 'complete' === document.readyState ) {
			return fn();
		}

		document.addEventListener( 'DOMContentLoaded', fn, false );
	}

	dmtg.setup = {
		config: [],

		init: function() {
			if ( darkmodetg ) {
				this.config = darkmodetg.config;
				this.addDarkmodeWidget();
			}
		},

		addDarkmodeWidget: function() {
			const config = this.config;
			const options = {
				bottom: config.bottom,
				left: config.left,
				top: config.top,
				right: config.right,
				width: config.width,
				height: config.height,
				borderRadius: config.borderRadius,
				fontSize: config.fontSize,
				time: config.time,
				mixColor: '#fff',
				backgroundColor: config.backgroundColor,
				buttonColorLight: config.buttonColorLight,
				buttonColorTLight: config.buttonColorTLight,
				buttonColorDark: config.buttonColorDark,
				buttonColorTDark: config.buttonColorTDark,
				saveInCookies: config.saveInCookies,
				fixFlick: config.fixFlick,
				label: config.label,
				autoMatchOsTheme: config.autoMatchOsTheme,
				onDefault: config.onDefault,
				buttonAriaLabel: config.buttonAriaLabel
			}

			new Darkmode( options ).showWidget();

			document.getElementsByClassName( 'darkmode-toggle' )[0].onclick = ( function () { this.toggleBackground() } ).bind( this );

			if ( document.body.classList.contains('darkmode--activated') ) {
				this.addBackground();
				if ( this.config.fixFlick ) {
					document.documentElement.classList.remove('dmtg-fade');
				}
			} else {
				this.removeBackground();
			}

			var selector = '.darkmode-toggle,.darkmode-layer';
			if ( config.overrideStyles ) {
				selector = '.darkmode-toggle';
			}
			const els = document.querySelectorAll( selector );
			[].forEach.call( els, function( el ) {
				el.style.zIndex = '999999';
			} );
		},

		toggleBackground: function() {
			if ( document.body.classList.contains('darkmode--activated') ) {
				this.addBackground();
			} else {
				this.removeBackground();
			}
		},

		removeBackground: function() {
			const bg = document.getElementsByClassName( 'darkmode-background' )[0];
			if ( bg ) {
				bg.remove();
			}
		},

		addBackground: function() {
			if ( null !== document.querySelector( '.darkmode-background' ) ) { return; }
			var backgroundDiv = document.createElement( 'div' );
			backgroundDiv.setAttribute( 'class', 'darkmode-background' );
			document.body.insertBefore( backgroundDiv, document.body.firstChild );
		}
	};

	dmtgDomReady( function() {
		dmtg.setup.init();
	} );

} )();
