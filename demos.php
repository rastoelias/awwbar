<?php

// Prevent to load this file directly
if(!defined('INDEX')){
	exit;
}

// Place your demos inside this array
$demos = array(
	// EXAMPLE
	// Required : ID, name, url
	/*
	array(
		'ID' => 'awwbar', // unique ID - only letters (upper or lowercase), numbers (0-9), underscore (_), dash (-), space [no other characters!] 
		'name' => 'Awwbar', // 
		'url' => 'https://awwbar.coddons.com',
		'description' => 'Responsive theme switcher demo bar',
		'label' => '',
		'btn_link' => '#',
		'btn_color' => 'blue',
		'btn_icon' => '<i class="material-icons">&#xE0E1;</i>', // only for small and medium screen. If not set, then show default icon. Supported icons (font awesome, google).
		'btn_text' => 'Buy Now',
		'btn_target' => '',
		'img_preview' => '', // http://.../demo.jpg, /img/demo/demo.jpg | width: 590px
		'img_preview@2x' => '',
		'theme' => '',
		'demo_switcher' = '',
		'device_box' => '',
		'device_box_position' => '',
		'logo_uri' => ''
	)
	*/
	// demo 1
	array(
		'ID' => 'awwbar', 
		'name' => 'Awwbar',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Responsive theme switcher demo bar',
		'label' => '<span class="label label-php">PHP</span><span class="label label-new">NEW</span>',
		'btn_link' => 'https://codecanyon.net',
		'btn_color' => '',
		'btn_icon' => '',
		'btn_text' => '',
		'img_preview' => '/preview/awwbar.jpg',
		'img_preview@2x' => '/preview/awwbar@2x.jpg',
		
		'theme' => '',
		'device_box' => true,
		'logo_uri' => 'http://lias.sk',
		'device_box_position' => 'left'
	),
	// demo 2
	array(
		'ID' => 'contactform', 
		'name' => 'Simple AJAX Contact Form',
		'url' => 'http://contactform.coddons.com/example.php',
		'description' => 'Mauris dapibus, est id placerat ultrices',
		'label' => '<span class="label label-bootstrap">Bootstrap</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'blue',
		'btn_icon' => '<i class="fa fa-download"></i>',
		'btn_text' => 'Download',
		'btn_target' => '_self'
	),
	// demo 3
	array(
		'ID' => 'demo3', 
		'name' => 'Donec sagittis',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Maecenas vel nunc odio',
		'label' => '<span class="label label-wordpress">WordPress</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'purple',
		'btn_icon' => '<i class="fa fa-download"></i>',
		'btn_text' => 'Download (Free)',
		'btn_target' => '_self'
	),
	// demo 4
	array(
		'ID' => 'demo4',
		'name' => 'Donec maximus',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Phasellus pulvinar et urna quis malesuada',
		'label' => '<span class="label label-woocommerce">WooCommerce</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'indigo',
		'btn_text' => 'Free',
		'btn_target' => '_self'
	),
	// demo 5
	array(
		'ID' => 'demo5',
		'name' => 'Nunc fringilla',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Mauris arcu ante',
		'label' => '<span class="label label-html">HTML</span><span class="label label-css">CSS</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'lightblue',
		'btn_text' => 'Buy now (9€)',
		'btn_target' => '_self'
	),
	// demo 6
	array(
		'ID' => 'demo6',
		'name' => 'Etiam in ligula',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Cras congue et tellus quis',
		'label' => '<span class="label label-wordpress">WordPress</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'teal',
		'btn_icon' => '<i class="fa fa-download"></i>',
		'btn_text' => 'Free Download',
		'btn_target' => '_self'
	),
	// demo 7
	array(
		'ID' => 'demo7',
		'name' => 'Maecenas ac tempus',
		'url' => 'http://awwbar.coddons.com',
		'description' => 'Duis vitae nibh quis sem',
		'label' => '<span class="label label-prestashop">PrestaShop</span>',
		'btn_link' => '#aaa',
		'btn_color' => 'green',
		'btn_target' => '_self'
	)
	// ...
);
?>