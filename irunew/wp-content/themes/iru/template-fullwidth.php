<?php
	/**
 * Template Name: Fullwidth
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();

?> 
			<div class="col-md-12 col-sm-12 content-area full_temp iru-right" id="main-column">
					<div class="contentpanel">
						<main id="main" class="site-main" role="main">
							<?php 
							while (have_posts()) {
								the_post();

							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">
										<?php the_content(); ?> 
							
									</div><!-- .entry-content -->
								</article><!-- #post-## -->
							<?php 
								} //endwhile;
							?> 
							
						</main>
						
					</div>
				</div>

<?php get_footer(); ?> 