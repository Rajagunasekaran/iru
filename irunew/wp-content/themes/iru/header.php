<?php
/**
 * The theme header
 * 
 * @package bootstrap-basic
 */
?>
<!DOCTYPE html>
<!--[if lt IE 7]>  <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]>     <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]>     <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title('|', true, 'right'); ?></title>
		<meta name="viewport" content="width=device-width">

		<link rel="profile" href="http://gmpg.org/xfn/11">
		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/favicon.ico">
		<!--wordpress head-->
		<?php wp_head(); ?>
		
		<style type="text/css">
			@media screen and (min-width: 1200px) {
			  .container {
				max-width: 970px;
			  }
			}
		</style>
	</head>
<?php
	/*** Get Background From CF***/
	$bodybg = get_field('body_background','option');
	if($bodybg!=''){
		$bodybgimg = 'style="background-image:url('.$bodybg.')"';
	}else{
		$bodybgimg = "";
	}
?>

<?php
	$class = '';
	if(!is_front_page())
		$class = "innerpages";
?>
<body <?php body_class($class); ?> <?php echo $bodybgimg; ?>>
		<!--[if lt IE 8]>
			<p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
		<![endif]-->
		
		
		<div class="container page-container header-container">
			
			<header role="banner">
				<div class="row row-with-head site-branding">
					<div class="col-md-8 site-logo">
						<?php
							/*** Get Logo From CF***/
								$logoimg = get_field('header_logo','option');
							if($logoimg!=''){
								$logo = $logoimg;
							}else{
								$logo = get_template_directory_uri()."/logo.png";
							}
							
						?>
							<a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo $logo; ?>"></a>
						
						
					</div>
					<div class="col-md-4 search-right">
						<div class="sr-only">
							<a href="#content" title="<?php esc_attr_e('Skip to content', 'bootstrap-basic'); ?>"><?php _e('Skip to content', 'bootstrap-basic'); ?></a>
						</div>
						<?php if (is_active_sidebar('header-right')) { ?> 
						<div class="pull-right">
							<?php dynamic_sidebar('header-right'); ?> 
						</div>
						<div class="clearfix"></div>
						<?php } // endif; ?> 
					</div>
				</div><!--.site-branding-->
				
				<div class="row main-navigation iru-menu">
					<div class="col-md-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-primary-collapse">
									<span class="sr-only"><?php _e('Toggle navigation', 'bootstrap-basic'); ?></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div>
							
							<div class="collapse navbar-collapse navbar-primary-collapse">
								<?php wp_nav_menu(array('theme_location' => 'primary', 'container' => false, 'menu_class' => 'nav navbar-nav', 'walker' => new BootstrapBasicMyWalkerNavMenu())); ?> 
							</div><!--.navbar-collapse-->
						</nav>
					</div>
				</div><!--.main-navigation-->
			</header>
		</div>
		<?php 
			global $post;
			if(is_front_page()){			
				echo do_shortcode('[iru_slider]');				
			}
		?>
        <div class="container page-container">
			<?php if(is_page_template('template-reseachcenter.php')){
					$banner = get_field('banner_image');
					if($banner != ''){
						echo '<div class="bannerImage" style="background-image:url('.$banner.')"></div>';	
					}
				} ?>
	        <?php
				if(is_page() && !is_front_page() || is_singular('member_universities')){
					
					if(is_singular('member_universities'))
						$parent_title = 'locations';
					elseif(is_page_template('template-reseachcenter.php'))
						$parent_title = get_the_title();	
					else	
						$parent_title = get_parent_title($post->ID); ?>
					<!-- <div class="container page-container header-container">	 -->
		            	<div class="page_header">
		                    <header class="entry-header">
		                        <h2 class="entry-title"><a href="<?php echo get_permalink(get_parent_id($post->ID)); ?>"><?php echo $parent_title ?></a></h2>
		                     </header><!-- .entry-header -->
		                </div>          
	            	<!-- </div> -->
	        <?php } ?>
        	<?php 
				global $post;
				if(is_front_page()){ ?>				
					<div id="homepage-content" class="homecontent">		
						<div id="content" class="content-bg row-with-vspace site-content content_wrap parent_<?php echo get_parent_zero_id() ?>" <?php echo $bodybgimg; ?>>			
				<?php }else{ ?>
					<div id="content" class="row-with-vspace site-content content_wrap parent_<?php echo get_parent_zero_id() ?>">
					<?php } ?>