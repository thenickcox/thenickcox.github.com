<?php

//
//  Custom Child Theme Functions
//

// I've included a "commented out" sample function below that'll add a home link to your menu
// More ideas can be found on "A Guide To Customizing The Thematic Theme Framework" 
// http://themeshaper.com/thematic-for-wordpress/guide-customizing-thematic-theme-framework/

// Adds a home link to your menu
// http://codex.wordpress.org/Template_Tags/wp_page_menu
//function childtheme_menu_args($args) {
//    $args = array(
//        'show_home' => 'Home',
//        'sort_column' => 'menu_order',
//        'menu_class' => 'menu',
//        'echo' => false
//    );
//	return $args;
//}
//add_filter('wp_page_menu_args','childtheme_menu_args');

// Unleash the power of Thematic's dynamic classes
// 
// IF YOU UNCOMENT THIS THE CLEARFIX WILL NOT SHOW UP
define('THEMATIC_COMPATIBLE_BODY_CLASS', true);
define('THEMATIC_COMPATIBLE_POST_CLASS', true);

// Unleash the power of Thematic's comment form
//
define('THEMATIC_COMPATIBLE_COMMENT_FORM', true);

// Unleash the power of Thematic's feed link functions
//
define('THEMATIC_COMPATIBLE_FEEDLINKS', true);

// Change the doctype
function childtheme_create_doctype($content) {

	$content = '<!DOCTYPE html>';
	
 	$content .= "\n";
	
 	$content .= '<!--[if IEMobile 7]><html class="no-js iem7 oldie"><![endif]-->
	<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="en"><![endif]-->
	<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie" lang="en"><![endif]-->
	<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie" lang="en"><![endif]-->
	<!--[if gt IE 8]><!--><html class="no-js" lang="en"><!--<![endif]-->
	<!--[if (gte IE 9)|(gt IEMobile 7)]><!--><html class="no-js"';
	
 	return $content;
}

add_filter('thematic_create_doctype', 'childtheme_create_doctype');
 
//replace the lang attribute
function childtheme_create_attributes($content) {

	$content = 'lang="en"';
	
	return $content;
}

add_filter('language_attributes', 'childtheme_create_attributes');
 
//add the closing endif, replace the head tag and add the meta charset="utf-8" tag
function childtheme_create_head($content) {

 $content = '<!--<![endif]-->';
 
 $content .= "\n";
 
 $content .= '<head>';
 
 $content .= "\n";
 
 $content .= '<meta charset="utf-8">';
 
 $content .= "\n";
 
 return $content;
 
}
add_filter('thematic_head_profile', 'childtheme_create_head');
 
//remove the meta http-equiv="Content-Type" content="text/html; charset=UTF-8" tag
function childtheme_create_create_charset($content) {

 $content = "";
 
 return $content;
 
}

add_filter('thematic_create_contenttype', 'childtheme_create_create_charset');

// Add the needed style and javascript for home page
function add_to_head(){ ?>

    <!-- http://t.co/dKP3o1e -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, target-densitydpi=160dpi, initial-scale=1">
    
    <link rel="stylesheet" href="http://cloud.typography.com/753298/70758/css/fonts.css" type="text/css" />
    
    <!-- For less capable mobile browsers
	<link rel="stylesheet" media="handheld" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/handheld.css?v=1">  -->
    
    <!-- If you want seperate style sheets for print and all screen widths use these --> 
    <link rel="stylesheet" media="screen" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/style.css?v=1">
	<link rel="stylesheet" media="print" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/print.css?v=1">
	<!-- For progressively larger displays. Do yourself a favor and build from big to small -->
	<link rel="stylesheet" media="only screen and (min-width: 480px)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/480.css?v=1">
     <link rel="stylesheet" media="only screen and (min-width: 768px)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/600.css?v=1"> 
    <link rel="stylesheet" media="only screen and (min-width: 768px)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/768.css?v=1"> 
    <link rel="stylesheet" media="only screen and (min-width: 992px)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/992.css?v=1">
    <link rel="stylesheet" media="only screen and (min-width: 1382px)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/1382.css?v=1"> 
    <!-- For Retina displays -->
    <link rel="stylesheet" media="only screen and (-webkit-min-device-pixel-ratio: 2), only screen and (min-device-pixel-ratio: 2)" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/2x.css?v=1"> 
    
     <!-- If you want all browsers and print files in one css file comment out the above 7 seperate style sheets and uncomment this one. I would combine your files into this file after you style each screen size. -->
	<!-- <link rel="stylesheet" href="<?php echo get_stylesheet_directory_uri(); ?>/library/styles/styleAll.css?v=1"> -->
    
    <!-- JavaScript at bottom except for Modernizr -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/libs/modernizr-2.5.3.min.js"></script>
    
    <!-- For iPhone 4 -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/h/apple-touch-icon.png">
    
    <!-- For iPad 1-->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/m/apple-touch-icon.png">
    
    <!-- For iPhone 3G, iPod Touch and Android -->
    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/l/apple-touch-icon-precomposed.png">
    
    <!-- For Nokia -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/l/apple-touch-icon.png">
    
    <!-- For everything else -->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/favicon.png">
    
    <!--iOS. Delete if not required -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    
    <link rel="apple-touch-startup-image" href="<?php echo get_stylesheet_directory_uri(); ?>/library/images/splash.png">
    
    <!--Microsoft. Delete if not required -->
    <meta http-equiv="cleartype" content="on">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    
    <!-- http://t.co/y1jPVnT -->
    <link rel="canonical" href="/">
    
	<?php
	
}

add_action('wp_head', 'add_to_head');

// Unhook default Thematic functions
function unhook_thematic_access() {

    remove_action('thematic_header','thematic_access',9);
	
}
add_action('init','unhook_thematic_access');

// rebuild the nav with html 5 nav. There's probably a better way to do this, but ok for a start.
function childtheme_override_access() { ?>
	<nav id="access" role="navigation">
		<div class="skip-link"><a href="#content"><?php _e('Skip to content', 'thematic'); ?></a></div>
			<?php if ((function_exists("has_nav_menu")) && (has_nav_menu(apply_filters('thematic_primary_menu_id', 'primary-menu')))) {
	    		echo  wp_nav_menu(thematic_nav_menu_args());
    		} else {
    			echo  thematic_add_menuclass(wp_page_menu(thematic_page_menu_args()));	
    		} ?>
	</nav><!-- #access -->
<?php }

add_action('thematic_header','childtheme_override_access');
		
// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function add_menuclass($ulclass) {

	return preg_replace('/<ul>/', '<ul class="sf-menu">', $ulclass, 1);
	
}
add_filter('wp_page_menu','add_menuclass');

// Add to footer
function after_footer() {?>

	<!-- Scripts -->
	<script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/plugins.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/script.js"></script>
    
    <!--[if (lt IE 9) & (!IEMobile)]>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/libs/DOMAssistantCompressed-2.8.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/libs/selectivizr-1.0.1.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/scripts/libs/respond.min.js"></script>
    <![endif]-->
	<?php
	
}



add_filter ('thematic_after', 'after_footer');

// Remove the site title to add hgroup and h1
function remove_title() {

	remove_action('thematic_header','thematic_blogtitle',3);
	
}
add_action('init', 'remove_title');

// adds hgroup and h1 tag 
function my_blogtitle() { ?>

	<hgroup><h1 id="blog-title"><span><a href="<?php echo home_url() ?>/" title="<?php bloginfo('name') ?>" rel="home"><?php bloginfo('name') ?></a></span></h1>
    
<?php }
add_action('thematic_header','my_blogtitle',3);

// Remove the description
function remove_description() {

	remove_action('thematic_header','thematic_blogdescription',5);
	
}
add_action('init', 'remove_description');

// Change description to an h2 and closes the hgroup
function my_blogdescription() { 

	$blogdesc = '"blog-description">' . get_bloginfo('description');
	
	echo "\t\t<h2 id=$blogdesc</h2></hgroup>\n\n";
	        
 }
add_action('thematic_header','my_blogdescription',5);

// Get the new loops
include('library/extensions/newloops.php');

// Add a link back to Child Theme
function childtheme_theme_link($themelink) {

 return $themelink . '. <a class="child-theme-link" Design by <a href="http://www.ejhansel.com/" title="Designed by ejhansel.com">Designed by ejhansel.com</a>';
 
}
add_filter('thematic_theme_link', 'childtheme_theme_link'); 


// Add aside to widgets
function change_before_widget_area($content) {
    return str_replace('div', 'aside', $content);
}
add_filter('thematic_before_widget_area','change_before_widget_area');

function change_after_widget_area($content) {
    return str_replace('div', 'aside', $content);
}
add_filter('thematic_after_widget_area','change_after_widget_area'); 

?>