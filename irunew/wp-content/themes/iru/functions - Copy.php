<?php
/**
 * Bootstrap Basic theme
 * 
 * @package bootstrap-basic
 */

define('home_page',get_option('page_on_front'));
define('blog_page',get_option('page_for_posts'));
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
			'name'          => __('Navigation bar right', 'bootstrap-basic'),
			'id'            => 'navbar-right',
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
			'name'          => __('Statistics Sidebar Left', 'bootstrap-basic'),
			'id'            => 'tatistics-sidebar-left',
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
		wp_enqueue_script('atham-script', get_template_directory_uri() . '/js/atham.js');
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
						$iru_slider .= '<div class="slider_item_">'; 
						$iru_slider .='<a href="javascript:void(0)" class="btn dp-btn-small">'.$caption.'</a>';
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
		    echo  get_irucategories($iru_cat);
	 }
	elseif($method == 'locations'){
		    echo  get_location($_REQUEST['location']);
	}
	
}


function get_irucategories($atts){
	$iru++;
	$title = isset($atts['title']) ? $atts['title'] : '';
	$category = isset($atts['category']) ? $atts['category'] : '';
	$show = isset($atts['show']) ? $atts['show'] : '5';
	$offset = isset($atts['offset']) ? $atts['offset'] : '1';
	$iru_category='';
	$the_iru_category = new WP_Query( array( 'posts_per_page' => $show ,'offset'=>$offset,'category_name'=>$category,'post_type'=>'post','post_status'=>'publish') );
	$total_post=$the_iru_category->found_posts;
   
	
	$iru_category.='<div class="iru_category" id="iru_'.$category.'">';
	 if($offset>=2)
	  $iru_category.='<div class="iru_button top" data-offset="'.$offset.'" data-cat="'.$category.'"><i class="fa fa-angle-up"></i></div>';
	
		if ( $the_iru_category->have_posts() ) {
		   while ( $the_iru_category->have_posts() ) { $the_iru_category->the_post();
				 $dt=date('l,d,Y',strtotime($the_iru_category->post->post_date)); 
				 $iru_category.='<div class="iru_category_item">';
						 $iru_category.='<div class="date_info">'.$dt.'</div>';
						 $iru_category.='<div class="iru_information"><a href="'.get_the_permalink($the_iru_category->post->ID).'"><h3 class="iru_title">'.$the_iru_category->post->post_title.'</h3></a>';
						 $iru_category.='<div>'.iru_limit_words($the_iru_category->post->post_content,15).'</div>';
						 $iru_category.='<a class="iru_readmore">read more >></a></div>';
				 $iru_category.='</div>';
		   }
		}
	wp_reset_postdata();
	

	 $offset++; 
	if($total_post>$show && $offset<=10)
	         $iru_category.='<div class="iru_button down" data-offset="'.$offset.'" data-cat="'.$category.'"><i class="fa fa-angle-down"></i></div>';
	
	$iru_category.='</div>';
	return $iru_category;
}
add_shortcode('iru_category','get_irucategories');


function iru_limit_words($string, $word_limit){
    $words = explode(" ",$string);
    return implode(" ", array_splice($words, 0, $word_limit));
}


include('functions2.php');


add_shortcode('iru_category','get_irucategories');


function iru_get_archives(){
   return wp_get_archives('type=yearly&echo=0');
}
add_shortcode('iru_getarchives','iru_get_archives');


