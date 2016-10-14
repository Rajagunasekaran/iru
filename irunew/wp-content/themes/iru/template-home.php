<?php
	/**
 * Template Name: Home Template
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
?> 
				<div class="col-md-8 col-sm-8 content-area home_temp iru-right" id="main-column">
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
							<?php
							/***ACF Featured Page from home page settings***/
							
							$featuredpages = get_field('feature_page');
							
							if($featuredpages!=''){
							$prodc =1;
							echo '<div class="clearlist">';
							foreach($featuredpages as $featuredpage){
							if($prodc % 2 == 1) {echo '</div><div class="pages-row">';}
									?> 
										<div class="col-md-6 col-sm-6 featureimgs" style="background-image: url('<?php echo $featuredpage['image'];?>');">
												<a href="<?php echo $featuredpage['link']?>"><!-- <img src="<?php //echo $featuredpage['image'];?>"> -->
												
												<div class="iruboxtle"><?php echo $featuredpage['title']?></div></a>
										</div>
						<?php 
								$prodc++;
								}
								echo '</div>';
							}
							
						?>
						
						<?php
							/***ACF Logos Linking from home page settings***/
							
							$logos = get_field('logo');
							
							if($logos!=''){
							$prodc =1;
							echo '<div class="clearlist">';
							foreach($logos as $logo){
							if($prodc % 3 == 1) {echo '</div><div class="logos-row">';}
									?> 
										<div class="col-md-4 col-sm-4 featurelogos" style="background-image: url('<?php echo $logo['logo'];?>');">
												<a href="<?php echo $logo['link']?>"><!-- <img src="<?php //echo $logo['logo'];?>">-->
												</a> 
										</div>
						<?php 
								$prodc++;
								}
								echo '</div>';
							}
							
						?>
									
								</article><!-- #post-## -->
							<?php 
								} //endwhile;
							?> 
							
						</main>
						
					</div>
				</div>

<?php get_sidebar('left'); ?>
<?php get_footer(); ?> 