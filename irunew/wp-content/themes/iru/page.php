<?php
/**
 * Template for displaying pages
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = 8; 
?> 
<?php get_sidebar('page-left'); ?> 
				<div class="col-md-<?php echo $main_column_size; ?> content-area" id="main-column">
					<main id="main" class="site-main" role="main">
						<?php 
						while (have_posts()) {
							the_post();
							get_template_part('content', 'page');
						} //endwhile;
						?> 
					</main>
		</div>
<?php get_footer(); ?> 