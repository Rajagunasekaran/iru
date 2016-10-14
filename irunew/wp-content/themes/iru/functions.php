<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */

define('home_page',get_option('page_on_front'));
define('blog_page',get_option('page_for_posts'));
define('NOIMAGE',get_stylesheet_directory_uri().'/img/noimage.jpg');
add_filter('widget_text', 'do_shortcode');
require_once('inc/iru_image_resizer.php');
/**
 * Required WordPress variable.
 */
if (!isset($content_width)) {
	$content_width = 1170;
}


if (!function_exists('bootstrapBasicSetup')) {
	/**
	 * Setup theme and register support wp features.
	 */
	function bootstrapBasicSetup() 
	{
		/**
		 * Make theme available for translation
		 * Translations can be filed in the /languages/ directory
		 * 
		 * copy from underscores theme
		 */
		load_theme_textdomain('bootstrap-basic', get_template_directory() . '/languages');

		// add theme support post and comment automatic feed links
		add_theme_support('automatic-feed-links');

		// enable support for post thumbnail or feature image on posts and pages
		add_theme_support('post-thumbnails');

		// add support menu
		register_nav_menus(array(
			'primary' => __('Primary Menu', 'bootstrap-basic'),
		));

		// add post formats support
		add_theme_support('post-formats', array('aside', 'image', 'video', 'quote', 'link'));

		// add support custom background
		add_theme_support(
			'custom-background', 
			apply_filters(
				'bootstrap_basic_custom_background_args', 
				array(
					'default-color' => 'ffffff', 
					'default-image' => ''
				)
			)
		);
	}// bootstrapBasicSetup
}
add_action('after_setup_theme', 'bootstrapBasicSetup');


if (!function_exists('bootstrapBasicWidgetsInit')) {
	/**
	 * Register widget areas
	 */
	function bootstrapBasicWidgetsInit() 
	{
		register_sidebar(array(
			'name'          => __('Header right', 'bootstrap-basic'),
			'id'            => 'header-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		

		register_sidebar(array(
			'name'          => __('Sidebar Publication', 'bootstrap-basic'),
			'id'            => 'sidebar-publication',
			'before_widget' => '',
			'after_widget'  => '',
			'before_title'  => '',
			'after_title'   => '',
		));

		register_sidebar(array(
			'name'          => __('Sidebar left', 'bootstrap-basic'),
			'id'            => 'sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => __('Sidebar right', 'bootstrap-basic'),
			'id'            => 'sidebar-right',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name'          => __('News Sidebar Left', 'bootstrap-basic'),
			'id'            => 'news-sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	
		register_sidebar(array(
			'name'          => __('Statistics', 'bootstrap-basic'),
			'id'            => 'statistics',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
		
		register_sidebar(array(
			'name'          => __('Page Sidebar Left', 'bootstrap-basic'),
			'id'            => 'page-sidebar-left',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => __('Footer left', 'bootstrap-basic'),
			'id'            => 'footer-left',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));

		register_sidebar(array(
			'name'          => __('Footer right', 'bootstrap-basic'),
			'id'            => 'footer-right',
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		));
	}// bootstrapBasicWidgetsInit
}
add_action('widgets_init', 'bootstrapBasicWidgetsInit');


if (!function_exists('bootstrapBasicEnqueueScripts')) {
	/**
	 * Enqueue scripts & styles
	 */
	function bootstrapBasicEnqueueScripts() 
	{
		wp_enqueue_style('iru-style', get_template_directory_uri() . '/css/iru_theme_styles.css');
		wp_enqueue_style('iru-basic-style', get_stylesheet_uri());
		
		/*wp_enqueue_style('bootstrap-style', get_template_directory_uri() . '/css/bootstrap.css');
		wp_enqueue_style('bootstrap-theme-style', get_template_directory_uri() . '/css/bootstrap-theme.min.css');
		wp_enqueue_style('fontawesome-style', get_template_directory_uri() . '/css/font-awesome.min.css');*/
		wp_enqueue_style('main-style', get_template_directory_uri() . '/css/main.css');

		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/iru_scripts.js');	
		
		/*wp_enqueue_script('modernizr-script', get_template_directory_uri() . '/js/vendor/modernizr.min.js');
		wp_enqueue_script('respond-script', get_template_directory_uri() . '/js/vendor/respond.min.js');
		wp_enqueue_script('html5-shiv-script', get_template_directory_uri() . '/js/vendor/html5shiv.js');
		wp_enqueue_script('jquery');
		wp_enqueue_script('bootstrap-script', get_template_directory_uri() . '/js/vendor/bootstrap.min.js');*/
		wp_enqueue_script('main-script', get_template_directory_uri() . '/js/main.js');
		wp_enqueue_script('secondary-script', get_template_directory_uri() . '/js/script.js');
		//wp_enqueue_style('bootstrap-basic-style', get_stylesheet_uri());
	}// bootstrapBasicEnqueueScripts
}
add_action('wp_enqueue_scripts', 'bootstrapBasicEnqueueScripts');


/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';


/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';


/**
 * Custom dropdown menu and navbar in walker class
 */
require get_template_directory() . '/inc/BootstrapBasicMyWalkerNavMenu.php';


/**
 * Template functions
 */
require get_template_directory() . '/inc/template-functions.php';


/**
 * --------------------------------------------------------------
 * Theme widget & widget hooks
 * --------------------------------------------------------------
 */
require get_template_directory() . '/inc/widgets/BootstrapBasicSearchWidget.php';
require get_template_directory() . '/inc/template-widgets-hook.php';


add_action("login_head", "my_login_head");
function my_login_head() {
  if(!is_user_logged_in()){ 
 echo "
 <style>
     .login #login h1 a {
  background-image: url('".get_stylesheet_directory_uri()."/img/login-logo.png') !important;
  height: 108px !important;
  width: 320px !important;
  background-size: 320px 108px !important;
 }
 html,body{ background:#FFF !important; }
 .login .message,.login form{ box-shadow:2px 0 4px 4px rgba(0, 0, 0, 0.1) !important; }
 </style>
 ";
  }
}


add_action( 'init', 'register_shortcodes');
//Filter to make the shortcode work in widget
add_filter( 'widget_text', 'do_shortcode');
/***Custom functions**/
function sociallinks_function() {
	
	$return_string = '';
	
	$return_string.= '<ul class="sociallinks">';
	
	$getsocials= get_field('sociallinks','option');
	
	
	foreach($getsocials as $getsocial){
			
				
			$return_string.= '<li><a target="_blank" class='.trim(strtolower($getsocial['title'])).' href='.$getsocial['link'].'><i class="fa '.strtolower($getsocial['social_icon']).'"></i>
							<span></span></a></li>';
	}
   $return_string.= '</ul>';
   return $return_string;
}

function register_shortcodes(){
   add_shortcode('sociallinks', 'sociallinks_function');
   add_shortcode('emailaddress', 'emailaddress_function');
}

function clean($string) {
   $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

   return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
}


function loginpage_custom_link() {
	return home_url();
}
add_filter('login_headerurl','loginpage_custom_link'); 

// changing the alt text on the logo to show your site name
function mb_login_title() { return get_option( 'blogname' ); }
add_filter( 'login_headertitle', 'mb_login_title' );


function get_slider(){
$post_id=home_page;
$iru_slider='';	
	if(have_rows('slider',$post_id)):
			$iru_slider .='<div class="slider_box">';
			$iru_slider .= '<div class="iru-slider-container">'; 
			$item=0;
			while( have_rows('slider',$post_id) ): the_row();
						$caption=get_sub_field('caption');
						$image=get_sub_field('image');
						$link=get_sub_field('link');
						if($image){
							 $_image = iru_resize( $image, '', 960,260, true );
							 $image_url=$_image["url"];
						}else{
						     $image_url=NOIMAGE;
						}
		
				       
					   
					   if(!empty($image_url)) $style="style=background-image:url('".$image_url."')";
				       
					   if(empty($link)): $link='javascript:void(0)'; endif;
				
						$iru_slider .='<div class="slider_div  slider_item_'.$item.'" '.$style.'>';
						$iru_slider .='<div class="container banner-msg">'; 
						$iru_slider .='<div class="slider_item_">'; 
						$iru_slider .='<a href="'.$link.'" class="btn dp-btn-small">'.$caption.'</a>';
						$iru_slider .='</div>';
						$iru_slider .='</div>';
						$iru_slider .='</div>';
						$item++;
			endwhile;
			$iru_slider .='</div>';
			$iru_slider .='</div>';
	endif; 
	echo $iru_slider;
}
add_shortcode('iru_slider','get_slider');


add_action('wp_head','iru_head');
function iru_head(){
echo $content.'<script type="text/javascript">
						var IRU_AJAX = "'.home_url().'/wp-admin/admin-ajax.php?action=iru";
						var theme_location = "'.get_stylesheet_directory_uri().'";
						
					</script>';
				
}
add_action( 'wp_ajax_iru','IRU_AJAX_action');
add_action( 'wp_ajax_nopriv_iru','IRU_AJAX_action');
function IRU_AJAX_action(){
	 $method = $_REQUEST['method'];
	 $offset = $_REQUEST['offset'];
	 $cat = $_REQUEST['cat'];
	 if($method == 'iru_category'){
		   $iru_cat['category']=$cat;
		   $iru_cat['offset']=$offset;
		   $iru_cat['is_ajax'] = 1;
		   echo  get_irucategories($iru_cat);
	 }
	elseif($method == 'locations'){
		    echo  get_location($_REQUEST['location']);
	}
	exit;
	
}


function get_irucategories($atts){
	$iru++;
	$title = isset($atts['title']) ? $atts['title'] : '';
	$category = isset($atts['category']) ? $atts['category'] : '';
	$show = isset($atts['show']) ? $atts['show'] : '3';
	$offset = isset($atts['offset']) ? $atts['offset'] : '1';
	$iru_category='';
	$the_iru_category = new WP_Query( array( 'posts_per_page' => $show ,'offset'=>$offset,'category_name'=>$category,'post_type'=>'post','post_status'=>'publish') );
	$total_post=$the_iru_category->found_posts;
     if(!isset($atts['is_ajax'])){
	  $iru_category.='<div class="iru_category loading" id="iru_'.$category.'">';
	  //if($offset>=2)
	  $iru_category.='<div class="iru_button top disabled"  data-offset="'.$offset.'" data-cat="'.$category.'"><i class="fa fa-angle-up"></i></div>
	  <div class="list_containers"><div class="listscroller">';
	 } 
	 
	 
	 
	  
	  $data = $offset * $show;		
	  if ( $the_iru_category->have_posts() ) {
		   while ( $the_iru_category->have_posts() ) { $the_iru_category->the_post();
				 $dt=date('l, d, M, Y',strtotime($the_iru_category->post->post_date)); 
				 $iru_category.='<div class="iru_category_item" id="data_'.$data++.'">';
						 $iru_category.='<div class="date_info">'.$dt.'</div>';
						 $iru_category.='<div class="iru_information"><a href="'.get_the_permalink($the_iru_category->post->ID).'"><h3 class="iru_title">'.iru_limit_words($the_iru_category->post->post_title, 10).'</h3></a>';
						 $iru_category.='<div>'.iru_limit_words($the_iru_category->post->post_content,15).'</div>';
						 $iru_category.='<a class="iru_readmore">read more >></a></div>';
				 $iru_category.='</div>';
		   }
		}
	wp_reset_postdata();
	
	if(!isset($atts['is_ajax'])){
		 $offset++; 
		if($total_post>$show && $offset<=10)
				 $iru_category.='</div></div><div class="iru_button down" data-feed="2" data-offset="'.$offset.'" data-cat="'.$category.'"><i class="fa fa-angle-down"></i></div>';
		$iru_category.='</div>';
		}
		return $iru_category;
	
}
add_shortcode('iru_category','get_irucategories');


function iru_limit_words($string, $word_limit){
    
	$string = strip_tags(strip_shortcodes($string));
	
	$words = explode(" ",$string);
	
    return implode(" ", array_splice($words, 0, $word_limit));
}


include('functions2.php');


add_shortcode('iru_category','get_irucategories');


function iru_get_archives(){
   return wp_get_archives('type=yearly&echo=0');
}
add_shortcode('iru_getarchives','iru_get_archives');

add_shortcode('display_event_tiles','get_events');
add_shortcode('display_content_tiles','get_events');
function get_events($atts = ''){
	
	
	global $post;
	$content = '';
	
	$image = isset($atts['image']) ? $atts['image'] : '';
	$text = isset($atts['text']) ? $atts['text'] : '';
	if(have_rows('content_section',$post->ID)){
		
		$content .= '<div class="iru_statistics content_boxes">';
		
		while( have_rows('content_section',$post->ID) ): the_row();
		
		
			$event = get_sub_field('selected_events',$post->ID);
			$_image = '';
			$content.='<div class="iru_row">'; 
				$content.='<div class="col-md-6 col-sm-6 statistics_item"><a class="view" href="'.get_permalink($event->ID).'"></a>';
				 	$content.='<h3>'.$event->post_title.'</h3>'; 
					if($image  != ''){
							if(has_post_thumbnail($event->ID)){
								 $img = get_post_thumbnail_id($event->ID);	
								
							   	 $_image = iru_resize( $img, '',270,130, true );
								
								 
							  	 $image_url=$_image["url"];
							 
							}else{
								$image_url=NOIMAGE;
							}
						  
						  $content .='<img  class="iru_image" src="'.$image_url.'" alt="'.$event->post_title.'"/>';
					}
					if($text  != ''){
						$eventcont=trim(strip_shortcodes($event->post_content));
						if(!empty($eventcont)){
						  	$content.='<div class="eventcontent">'.iru_limit_words($event->post_content,20).'</div>'; 
						}
					}
			  	$content.='</div>';	
			$content.='</div>';	
		
		endwhile;
		
		$content .= '</div>';	
		
		
	}
	
	return $content;
}

function column_1_3($atts = null,$content = ''){

	return '<div class="col-md-5 eventimg">'.$content.'</div>';
}

add_shortcode('column_1_3','column_1_3');


function event_info($atts = null){

	global $post;
	$eventinfo='';
	$hosted_by = get_field('hosted_by');
	$summary = get_field('event_summary');
	$start_date = get_field('start_date');
	$end_date = get_field('end_date');
	if($hosted_by != ''){
		$eventinfo.='<div class="event_subtitle"><h2>'.$hosted_by.'</h2></div>';
	}
	if($start_date != '' && $end_date!=''){
		$eventinfo.='<span class="date">'.$start_date.' - '.$end_date.'</span>';
	}
	if(trim($summary)!=''){
		$eventinfo.='<div class="eventsummary">'.$summary.'</div>';	
	}
	// if ('post' == get_post_type()) { 
   		if( have_rows('attach_file') ):
	    $eventinfo.='<div class="dropdown iru-dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><div class="iru_text">Download</div>
	    <div class="angle"><i class="fa fa-angle-down"></i>
        <ul class="dropdown-menu download">';
		    while ( have_rows('attach_file') ) : the_row();
		   			 $file=get_sub_field('file');
					 $attachment_id =$file["id"];
					 $filesize = filesize( get_attached_file( $attachment_id ) );
					 $filesize = size_format($filesize, 2);
					 $path_info = pathinfo( get_attached_file( $attachment_id ),PATHINFO_EXTENSION );
 	      			 $eventinfo.='<li><a href="'.$file['url'].'" target="_blank">'.$path_info.' ('.$filesize.')</a></li>';
	      	endwhile;
	   	$eventinfo.='</ul>
       	</div></button>
	  	</div>';
   
		endif;
	// }
	return $eventinfo;
}

add_shortcode('event_info','event_info');

function get_attach(){
	if ('page' == get_post_type()) { 
   		if( have_rows('attach_file') ):
	    $getattach.='<div class="dropdown iru-dropdown">
		<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><div class="iru_text">Download</div>
	    <div class="angle"><i class="fa fa-angle-down"></i>
        <ul class="dropdown-menu download">';
		    while ( have_rows('attach_file') ) : the_row();
		   			 $file=get_sub_field('file');
					 $attachment_id =$file["id"];
					 $filesize = filesize( get_attached_file( $attachment_id ) );
					 $filesize = size_format($filesize, 2);
					 $path_info = pathinfo( get_attached_file( $attachment_id ),PATHINFO_EXTENSION );
 	      			 $getattach.='<li><a href="'.$file['url'].'" target="_blank">'.$path_info.' ('.$filesize.')</a></li>';
	      	endwhile;
	   	$getattach.='</ul>
       	</div></button>
	  	</div>';
   
		endif;
	}
	return $getattach;
}
add_shortcode('get_attachment','get_attach');

add_filter( 'walker_nav_menu_start_el', 'iru_span' );

function iru_span( $item )
{
    return preg_replace( '~(<a[^>]*>)([^<]*)</a>~', '$1<span>$2</span><i class="fa fa-plus"></i></a>', $item);
}
function footerflag(){
	global $post;
	$footerflag='';
	if(wp_get_post_parent_id( $post->ID )==364){
		$footerflag='<div class="footer-flag" ><img src="'.get_stylesheet_directory_uri().'/img/aboriginal-flag.gif" alt="aboriginal-flag" width="86" height="28" class="alignnone size-full wp-image-3034" /></div>';
	}
	return $footerflag;
}
add_shortcode('footer_flag','footerflag');