<?php
	/**
 * Template Name: Statistics
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();

?> 
	
<?php get_sidebar('page-left'); ?> 
    		<div class="col-md-8 col-sm-8 content-area statistics_temp iru-right" id="main-column">
					<div class="contentpanel">
						<main id="main" class="site-main" role="main">
							<?php 
							while (have_posts()) {
								the_post();

							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">
										<?php the_content(); ?> 
										
                                        
                                        <div class="iru_statistics">
                                          <?php 
										      
											$statistics = get_field('statistics');
											 if(!empty($statistics)):
											    $iru=0;
												 $iru_statistics='';
												foreach($statistics as $statistics_info):
												   $iru_statistics.='<div class="iru_row">'; 
															$iru_statistics.='<div class="col-md-6 col-sm-6 statistics_item "><a class="view" href="'.$statistics_info["link"].'"></a>';
															 $iru_statistics.='<h3>'.$statistics_info["title"].'</h3>'; 
															  $image=$statistics_info["image"]; 
																if($image){
																$_image = iru_resize( $image, '',270,130, true );
																$image_url=$_image["url"];
																}else{
																$image_url=NOIMAGE;
																}
															  if(!empty($statistics_info["image"]))
															   $iru_statistics.='<img  class="iru_image" src="'.$image_url.'" alt="'.$statistics_info["title"].'"/>';
															   if(!empty($statistics_info["summary"])){
																  $iru_statistics.='<div class="summary">'.$statistics_info["summary"].'</div>'; 
															   }															 	
															  $iru_statistics.='</div>';				 
														
												   $iru_statistics.='</div>';
												  endforeach;
											 endif;
											 
										echo  $iru_statistics;
										 
										  ?>   
                                        
                                        </div>
                                        
									</div><!-- .entry-content -->
								</article><!-- #post-## -->
							<?php 
								} //endwhile;
							?> 
							
						</main>
						
					</div>
				</div>

<?php get_footer(); ?> 