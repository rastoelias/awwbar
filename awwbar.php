<?php

// Prevent to load this file directly
if(!defined('INDEX')){
	exit;
}

// If the protocol of your page is https than use a https page inside the iframe.
if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off'){
    $http_found = false;
	foreach($demos as $demo){
		if(preg_match('/^http:/', $demo['url'])){
			$http_found = true;
		}
	}
	if($http_found){
		echo 'Error: If the protocol of your page is https than use a https page inside the iframe.';
		exit;
	}
}

// Get demo data
if(isset($_GET['demo'])){
	
	$key = get_demo_key_by_name($demos, urldecode(trim($_GET['demo'],'/')));
	
	if( $key !== false ){
		
		$demo['html_title'] = $demo['html_title_demo_prefix'].$demos[$key]['name'];
		
		$demo['device_box'] = (isset($demos[$key]['device_box']) && (!empty($demos[$key]['device_box']) or $demos[$key]['device_box'] === false)) ? $demos[$key]['device_box'] : GLOBAL__DEVICE_BOX;
		$demo['device_box_position'] = (isset($demos[$key]['device_box_position']) && !empty($demos[$key]['device_box_position'])) ? $demos[$key]['device_box_position'] : GLOBAL__DEVICE_BOX_POSITION;
		
		$demo['url'] = $demos[$key]['url'];
		$demo['name'] = $demos[$key]['name'];
		$demo['theme'] = (isset($demos[$key]['theme']) && !empty($demos[$key]['theme'])) ? $demos[$key]['theme'] : GLOBAL__THEME;
		$demo['logo_URI'] = (isset($demos[$key]['logo_URI']) && !empty($demos[$key]['logo_URI'])) ? $demos[$key]['logo_URI'] : GLOBAL__LOGO_URI ;
		$demo['demo_switcher'] = (isset($demos[$key]['demo_switcher']) && $demos[$key]['demo_switcher'] === false) ? false : true;
		
		$demo['btn_color'] = (isset($demos[$key]['btn_color']) && !empty($demos[$key]['btn_color'])) ? $demos[$key]['btn_color'] : GLOBAL__BTN_COLOR;
		$demo['btn_icon'] = (isset($demos[$key]['btn_icon']) && !empty($demos[$key]['btn_icon'])) ? $demos[$key]['btn_icon'] : GLOBAL__BTN_ICON;
		$demo['btn_text'] = (isset($demos[$key]['btn_text']) && !empty($demos[$key]['btn_text'])) ? $demos[$key]['btn_text'] : GLOBAL__BTN_TEXT;
		$demo['btn_link'] = (isset($demos[$key]['btn_link']) && !empty($demos[$key]['btn_link'])) ? $demos[$key]['btn_link'] : '#';
		$demo['btn_target'] = (isset($demos[$key]['btn_target']) && !empty($demos[$key]['btn_target'])) ? $demos[$key]['btn_target'] : GLOBAL__BTN_TARGET;
		
		if($demo['btn_link'] == '#'){ $demo['btn_target'] = '_self'; }
		
	}
	else{
		
		header("HTTP/1.1 404 Not Found");
		require_once $_SERVER['DOCUMENT_ROOT'].'/404.html';
		exit;
		
	}
}

// Homepage
else{
	$demo['html_title'] = $demo['html_title_homepage'];
	$demo['theme'] = GLOBAL__THEME;
	$demo['logo_URI'] = GLOBAL__LOGO_URI;
	$demo['demo_switcher'] = true;
	$demo['device_box'] = GLOBAL__DEVICE_BOX;
	$demo['device_box_position'] = GLOBAL__DEVICE_BOX_POSITION;
	
}

// Functions
function get_demo_key_by_name($demos, $name){
	return array_search($name, array_column($demos, 'ID'));
}

function logo($theme){
	
	$file = '';
	$data_svg = '';
	$data_img = '';
	$data_hd = '';
	
	if($theme == 'light'){
		
		$svg = LOGO_FOR_LIGHT_THEME__SVG;
		$img = LOGO_FOR_LIGHT_THEME__IMG;
		$img_hd = LOGO_FOR_LIGHT_THEME__IMG_HD;
		
	}
	elseif($theme == 'dark'){
		
		$svg = LOGO_FOR_DARK_THEME__SVG;
		$img = LOGO_FOR_DARK_THEME__IMG;
		$img_hd = LOGO_FOR_DARK_THEME__IMG_HD;
		
	}
		
	if(!empty($svg)){
		$data_svg = $svg;
	}
	if(!empty($img)){
		$data_img = $img;
	}
	if(!empty($img_hd)){
		$data_img_hd = $img_hd;
	}
	
	if(!empty($svg)){
		$file = $svg;
	}elseif(!empty($img)){
		$file = $img;
	}?>
    
    <img
        src="/img/theme/<?php echo $theme.'/'.$file; ?>"
        data-svg="theme/<?php echo $theme.'/'.$data_svg; ?>"
        data-img="theme/<?php echo $theme.'/'.$data_img; ?>"
        data-img_hd="theme/<?php echo $theme.'/'.$data_img_hd; ?>"
        alt="logo"
    ><?php
}

function hsch( $value ){
	return htmlspecialchars( str_replace( "&#39;", "'", $value ), ENT_QUOTES);
}

?>