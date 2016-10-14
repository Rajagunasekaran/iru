<?php
	/**
 * Template Name: Contact
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();

?> 
			<div class="col-md-12 col-sm-12 content-area contact_temp iru-right" id="main-column">
					<div class="contentpanel">
						<main id="main" class="site-main" role="main">
							<?php 
							while (have_posts()) {
								the_post();

							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">
										<?php the_content(); ?> 
										
                                        
                                        <div class="iru_location">
                                          <?php 
										      
											$contact = get_field('contact');
											if(count($contact)>2): $contact=array_chunk($contact,2); else :  $contact[]=$contact; endif;
											 
											 if(!empty($contact)):
											    $iru=0;
												 $iru_contact='';
												foreach($contact as $contact_info):
												   $iru_contact.='<div class="iru_row">'; 
														 foreach($contact_info as $iru_contact_info):
															$iru_contact.='<div class="col-md-6 col-sm-6 contact_item ">';
															 $iru_contact.='<h3>'.$iru_contact_info["name"].'</h3>';  
															 $iru_contact.='<div class="address">'.$iru_contact_info["address"].'</div>';  
															  $iru_contact.='</div>';				 
														 endforeach;
												   $iru_contact.='</div>';
												  endforeach;
											 endif;
											 
										echo  $iru_contact;
										 $bottom_information = get_field('bottom_information');
										 if(!empty($bottom_information)) echo "<div class='bottom_information'>".$bottom_information."</div>";
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