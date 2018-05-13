<?php

// prevent to load this file directly
if(!defined('INDEX')){
	exit;
}

// Global Setting
define('GLOBAL__THEME', 'light'); // string: 'light', 'dark'
define('GLOBAL__LOGO_URI', '/'); // string: '/', 'http://domain.com'
define('GLOBAL__DEVICE_BOX', true); // boolean: true, false
define('GLOBAL__DEVICE_BOX_POSITION', 'center'); // string: 'center', 'left'
define('GLOBAL__BTN_COLOR', 'red');
define('GLOBAL__BTN_ICON', '<i class="material-icons">shopping_cart</i>');
define('GLOBAL__BTN_TEXT', 'Buy now');
define('GLOBAL__BTN_TARGET', '_blank'); // '_blank' = Opens the document in a new window or tab, '_self' = Opens the document in the same frame

/*	Logo
	If you want to use only Light Theme, upload and fill only logos for light theme,
	or if you want to use only Dark Theme, upload and fill only logos for dark theme,
	or if you want to use both Themes, upload and fill logos for both.
	Upload folder: /img/theme/(light|dark)/
*/
// Logo for light theme
define('LOGO_FOR_LIGHT_THEME__IMG', 	'logo.png'); // Required for light theme. Recommended size 36x36px.
define('LOGO_FOR_LIGHT_THEME__IMG_HD', 	'logo@2x.png'); // Optional. Recommended size 72x72px.
define('LOGO_FOR_LIGHT_THEME__SVG', 	'logo.svg'); // Optional. Recommended size 36x36px.
// Logo for dark theme
define('LOGO_FOR_DARK_THEME__IMG', 		'logo.png');  // Required for dark theme. Recommended size 36x36px.
define('LOGO_FOR_DARK_THEME__IMG_HD', 	'logo@2x.png'); // Optional. Recommended size 72x72px.
define('LOGO_FOR_DARK_THEME__SVG', 		'logo.svg'); // Optional. Recommended size 36x36px.

// Favicons
define('FAVICON_32', 'favicon_32.png'); // Štandard pre väčšinu desktopových prehliadačov
define('FAVICON_120', 'favicon_120.png'); // Štandard pre väčšinu desktopových prehliadačov
define('FAVICON_128', 'favicon_128.png'); // Štandard pre väčšinu desktopových prehliadačov
define('FAVICON_196', 'favicon-196.png'); // Android Chrome


// Device screen size
define('DEVICE_TABLET_SCREEN_W', 768); // Tablet screen width
define('DEVICE_TABLET_SCREEN_H', 1024); // Tablet screen height
define('DEVICE_MOBILE_SCREEN_W', 320); // Mobile screen width
define('DEVICE_MOBILE_SCREEN_H', 480); // Mobile screen height

// HTML title, description
define('HTML_TITLE_PREFIX', 'Preview: ');
$demo['html_title_homepage'] = 'Awwbar - Responsive theme switcher demo bar';
$demo['html_title_demo_prefix'] = 'Preview: ';
$demo['html_description'] = 'xx';

// Pretty URL
define('USE_PRETTY_URL', false); 
?>