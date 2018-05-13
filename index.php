<?php
define('INDEX', true);
require 'config.php'; // Configuration
include 'demos.php'; // YOUR DEMOS
require 'awwbar.php'; // App Core

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <title><?php echo hsch($demo['html_title']); ?></title>
    
    <link rel="stylesheet" href="/css/awwbar.css?x=<?=rand()?>">
	
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    
    <!-- Icon Fonts --><?php
	if(isset($demo['btn_icon'])){
		
		// Material icons
		if(strpos($demo['btn_icon'], 'class="material-icons"') !== false){ ?>
			<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"><?php	
		}
		// Font Awesome icons
		elseif(strpos($demo['btn_icon'], 'class="fa fa-') !== false){ ?>
			<link rel="stylesheet" href="/css/font-awesome.min.css"><?php
		}
		// Iconic
		elseif(strpos($demo['btn_icon'], 'class="oi"') !== false){ ?>
			<link rel="stylesheet" href="/css/open-iconic.min.css"><?php
		}
		
	}?>
    
    <!-- Favicons --><?php
	if(FAVICON_32 != ''){?><link rel="icon" href="/<?php echo FAVICON_32; ?>" sizes="32x32"> <!--  --><?php }?>
    
    <!-- jQuery -->
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    
    <!-- Awwbar -->
    <script type="text/javascript" src="/js/awwbar.js?x=<?=rand()?>"></script>
    
</head>

<body class="<?php echo 'theme-' . hsch($demo['theme']) . ' device-box-' . $demo['device_box_position']; ?>"><?php

	// Inject SVG icons. Right after the opening <body> tag ?>
	<?php include_once("img/icon-sprite.svg"); ?>
    
    <!-- Awwbar -->
    <div id="awwbar" class="clearfix">
    
    	<!-- Logo -->
        <div class="logo transition-200">
            <a href="<?php echo $demo['logo_URI']; ?>"><?php logo($demo['theme']); ?></a>
        </div>
        
        <!-- Menu -->
        <div class="menu">
            <ul>
                <li><?php
					if(count($demos) && $demo['demo_switcher']){
						$toggler = ' toggler';
						$text = '';
					}else{
						$toggler = '';
						$text = '<span class="text-muted">Preview: </span>';
					}?>
                    <span class="custom-select transition-200 <?php echo $toggler; ?>">
                        <a href="#">
                            <span class="btn"><span></span><span></span><span></span></span>
                            <span class="actual-demo"><?php
                            	
								if(isset($demo['name'])){
									echo $text.hsch($demo['name']);
								}else{
									echo 'Select demo...';	
								}?>
								
							</span>
                        </a>
                    </span><?php
                    if(count($demos) && $demo['demo_switcher']){?>
                        <div class="menu-list">
                            <div class="wrapper transition-200">
                            	<div class="container">
                                
                                	<!-- Menu Header  -->
                                    <div class="menu-header">
                                    	Menu
                                        <a href="#" class="btn-close" role="button">
                                        	<span class="btn-icon">
												<svg class="icon-svg" width="10" height="10">
                                                    <title>Remove Frame</title>
                                                    <use xlink:href="#icon-close" />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                
                                	<!-- Search -->
                                    <div class="search-box">
                                        <div class="custom-input">
                                        	<div class="input-btn">
												<svg class="icon-svg" width="21" height="21">
                                                    <title>Search</title>
                                                    <use xlink:href="#icon-search" />
                                                </svg>
                                            </div>
                                            <input type="text" name="search" placeholder="Search..." autocomplete="off" spellcheck="false">
                                        </div>
                                    </div>
                                    
                                    <!-- Demos -->
                                    <ul><?php
										
										$parse_url = parse_url( 'http://'.$_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] );
										$server_path = ( isset( $parse_url['path'] ) ) ? $parse_url['path'] : '' ;
										$server_path = ( isset( $parse_url['query'] ) ) ? $server_path . '?' . $parse_url['query'] : $server_path ;
										$server_path = ( isset( $parse_url['fragment'] ) ) ? $server_path . $parse_url['fragment'] : $server_path ;
									
                                        foreach($demos as $item){
                                            
											$demo_path = ( USE_PRETTY_URL ) ? '/'.urlencode($item['ID']).'/' : '/?demo='.urlencode( $item['ID'] ) ;
											
											$active = ( $demo_path == $server_path ) ? ' active' : '' ;
                                            
											// Labels
                                            $label = (isset($item['label'])) ? '<span class="labels">'.$item['label'].'</span>' : '' ;
											
											// Description
											$description = (isset($item['description']) && !empty($item['description'])) ? '<small>'.hsch($item['description']).'</small>' : '';
											
											// Img Preview 
											$img = ( isset( $item['img_preview'] ) ) ? $item['img_preview'] : '';
											$img_hd = ( isset( $item['img_preview@2x'] ) ) ? $item['img_preview@2x'] : '';
											?>
                                            
                                            <li>
                                            	<a href="<?php echo $demo_path; ?>"
                                                	class="transition-200 <?php echo $active; ?>"
													data-img="<?php echo $img; ?>"
													data-img_hd="<?php echo $img_hd; ?>"><?php
                                            		echo $label.'<span class="name">'.hsch($item['name']).'</span>'.$description; ?>
                                                </a>
                                            </li><?php
                                        }?>
                                    </ul>
                                    
                                    <!-- If no results -->
                                    <div class="no-results d-none">No results found for <strong>""</strong></div>
                                    
                                    <!-- Scroll for more btn -->
                                	<div class="scroll-for-more transition-200 visibility-hidden opacity-0">
                                    	Scroll for more
                                    </div>
                                    
                                </div>
                            </div>
                        </div><?php
                    }?>
                </li>
            </ul>
        </div>
        
        <!-- Devices --><?php
		if($demo['device_box']){ ?>
			<div class="devices">
				<ul>
					<li class="device">
						<a href="#" class="desktop icon icon-desktop active transition-200"
							data-w=""
							data-h=""
							title="Desktop">
							<span class="retina-fix">
								<svg class="icon-svg" width="26" height="26">
									<title>Desktop</title>
									<use xlink:href="#icon-desktop" />
								</svg>
							</span>
						</a>
					</li>
					<li class="device">
						<a href="#" class="tablet-270 icon icon-tablet-270 transition-200"
							data-w="<?php echo DEVICE_TABLET_SCREEN_H+15; ?>"
							data-h="<?php echo DEVICE_TABLET_SCREEN_W; ?>"
							title="Tablet <?php echo DEVICE_TABLET_SCREEN_H.' x '.DEVICE_TABLET_SCREEN_W; ?> (Landscape)">
							<span class="retina-fix">
								<svg class="icon-svg" width="22" height="26">
									<title>Tablet <?php echo DEVICE_TABLET_SCREEN_H.' x '.DEVICE_TABLET_SCREEN_W; ?> (Landscape)</title>
									<use xlink:href="#icon-tablet-270" />
								</svg>
							</span>
						</a>
					</li>
					<li class="device">
						<a href="#" class="tablet icon icon-tablet transition-200"
							data-w="<?php echo DEVICE_TABLET_SCREEN_W+15; ?>"
							data-h="<?php echo DEVICE_TABLET_SCREEN_H; ?>"
							title="Tablet <?php echo DEVICE_TABLET_SCREEN_W.' x '.DEVICE_TABLET_SCREEN_H; ?> (Portrait)">
							<span class="retina-fix">
								<svg class="icon-svg" width="18" height="26">
									<title>Tablet <?php echo DEVICE_TABLET_SCREEN_W.' x '.DEVICE_TABLET_SCREEN_H; ?> (Portrait)</title>
									<use xlink:href="#icon-tablet" />
								</svg>
							</span>
						</a>
					</li>
					<li class="device">
						<a href="#" class="mobile-270 icon icon-mobile-270 transition-200"
							data-w="<?php echo DEVICE_MOBILE_SCREEN_H+15; ?>"
							data-h="<?php echo DEVICE_MOBILE_SCREEN_W; ?>"
							title="Mobile <?php echo DEVICE_MOBILE_SCREEN_H.' x '.DEVICE_MOBILE_SCREEN_W; ?> (Landscape)">
							<span class="retina-fix">
								<svg class="icon-svg" width="18" height="26">
									<title>Mobile <?php echo DEVICE_MOBILE_SCREEN_H.' x '.DEVICE_MOBILE_SCREEN_W; ?> (Landscape)</title>
									<use xlink:href="#icon-mobile-270" />
								</svg>
							</span>
						</a>
					</li>
					<li class="device">
						<a href="#" class="mobile icon icon-mobile transition-200"
							data-w="<?php echo DEVICE_MOBILE_SCREEN_W+15; ?>"
							data-h="<?php echo DEVICE_MOBILE_SCREEN_H; ?>"
							title="Mobile <?php echo DEVICE_MOBILE_SCREEN_W.' x '.DEVICE_MOBILE_SCREEN_H; ?> (Portrait)">
							<span class="retina-fix">
								<svg class="icon-svg" width="11" height="26">
									<title>Mobile <?php echo DEVICE_MOBILE_SCREEN_W.' x '.DEVICE_MOBILE_SCREEN_H; ?> (Portrait)</title>
									<use xlink:href="#icon-mobile" />
								</svg>
							</span>
						</a>
					</li>
				</ul>
			</div><?php
		}?>
        
        <!-- Buttons -->
        <div class="buttons"><?php
            if(isset($demo['url'])){
				if(isset($demo['btn_link']) && $demo['btn_link'] != '#'){?>
					<a href="<?php echo $demo['btn_link']; ?>"
						target="<?php echo $demo['btn_target']; ?>"
						class="btn btn-main btn-<?php echo trim($demo['btn_color']); ?> transition-200">

						<span class="btn-icon"><?php echo $demo['btn_icon']; ?></span>
						<span class="btn-text"><?php echo $demo['btn_text']; ?></span>
					</a><?php
				}?>
                <a href="<?php echo $demo['url']; ?>" class="btn btn-close transition-200" role="button">
                    <span class="btn-icon">
						<svg class="icon-svg" width="10" height="10">
                            <title>Remove Frame</title>
                            <use xlink:href="#icon-close" />
                        </svg>
                    </span>
                    <span class="btn-text">
                    	Remove Frame
                    </span>
                </a><?php
            }?>
        </div>
        
    </div>
	
    <!-- iFrame -->
	<div class="div-iframe">
	
		<!-- Device info -->
		<div class="device-info"><div class="inside">&nbsp;</div></div><?php
		$src = (isset($demo['url'])) ? $demo['url'] : ''; ?>
        <iframe src="<?php echo $src; ?>">
        </iframe>
    </div>
    
    <!-- For retina or HD screen. Don't delete -->
    <div class="is_hd_screen"></div>
    
    <!-- iFrame overlay - menu onclick event -->
    <div class="overlay"></div>
    
    <!-- Responsive breakpoints -->
    <div class="viewport">
    	<span class="xs">xs</span>
    	<span class="sm">sm</span>
    	<span class="md">md</span>
    	<span class="lg">lg</span>
    	<span class="xl">xl</span>
    </div>
    
    <!-- Preview -->
	<div class="preview-arrow transition-200"><div class="inside"></div></div>
    <div class="preview transition-200"><div class="wrapper"></div></div>
    
</body>
</html>
