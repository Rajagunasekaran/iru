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
						<?php global $post;
						while (have_posts()) {
							the_post();
							
							$title = get_the_title();
							$logo = get_field('university_logo');
							$vice_chancellor = get_field('vice_chancellor_name');
							$vc_image = get_field('vice_chancellor_image');
							$website = get_field('website');
							$biography = get_field('biography');
								
							?>
                           <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                <header class="entry-header">
                                    <h1 class="entry-title"><?php the_title(); ?></h1>
                                </header><!-- .entry-header -->
                                <div class="univ_information">
                                	<div class="univ_logo"><img src="<?php echo $logo ?>" alt="<?php echo $title ?>" /></div>
                                    <div class="univ_vc"><img src="<?php echo $vc_image ?>" alt="<?php echo $vice_chancellor ?>" /></div>
                                    <p><b>Vice Chancellor</b><br /> <?php echo $vice_chancellor ?></p>                                    
                                    
                                    <?php if($biography != ''){ ?>
                                    <p><b>Biography</b><br /> <a href="<?php echo $biography ?>" target="_blank">Download Biography</a></p>                                    <?php } ?>
                                    <p><b>Website</b><br /> <a href="<?php echo $website ?>" target="_blank"><?php echo $website ?></a></p>
                                    
                                    
                                    
                                    
                                    
                                </div>
                                
                                <div class="entry-content">
                                    <?php the_content(); ?> 
                                    <div class="clearfix"></div>
                                </div><!-- .entry-content -->
	
	<footer class="entry-meta">
		<?php bootstrapBasicEditPostLink(); ?> 
	</footer>
</article><!-- #post-## -->
                            
                            <?php
						} //endwhile;
						?> 
					</main>
		</div>
<?php get_footer(); ?> 