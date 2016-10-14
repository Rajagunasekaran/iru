<?php
	/**
 * Template Name: Research Center
 * 
 * @package bootstrap-basic
 */

get_header();

/**
 * determine main column size from actived sidebar
 */
$main_column_size = bootstrapBasicGetMainColumnSize();
echo research_types();
?> 
	
			<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/2.2.2/isotope.pkgd.min.js"></script>
    		<div class="col-md-12 col-sm-12 content-area researchcenters" id="main-column">
					<div class="contentpanel">
						<main id="main" class="site-main" role="main">
							<?php 
							while (have_posts()) {
								the_post();

							?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="entry-content">
										<?php //the_content(); ?> 
										
                                        
                                        <div class="iru_statistics">
                                          <?php 
										  	  $args = array('posts_per_page' => -1,'post_type' => 'research_strengths','post_staus' => 'publish');
										      query_posts($args);
											  global $post;
											  $content = '';
											  if(have_posts()):
											  	while(have_posts()): the_post();
												
												 //$university = get_field('box_universities');	
												 $research_type = get_field('research_type');
												 
												 
												 
												 $univ = '';
												 $univ_image = '';
												 
												 
												
												if(have_rows('box_universities_repeater',$post->ID)){
												   while(have_rows('box_universities_repeater',$post->ID)): the_row(); 
													 //foreach($university as $items)	{

														$university_logo = get_sub_field('university_logo_image');
														$website = get_sub_field('research_link');
														$name = get_sub_field('university_name');

														
														if($univ != ''){
                                                                //$univ .= ', <a href="'.$website.'" target="_blank" >'.$items->post_title.'</a>';   
                                                                $univ .= ', <a href="'.$website.'" target="_blank" >'.$name.'</a>'; 
                                                        }else{
                                                                //$univ .= ' - <a href="'.$website.'" target="_blank" >'.$items->post_title.'</a>';
                                                                $univ .= ' - <a href="'.$website.'" target="_blank" >'.$name.'</a>';
                                                        }
														
														$univ_image .= '<a href="'.$website.'" target="_blank" ><img src="'.$university_logo.'" alt="'.$items->post_title.'" /></a>';
													 //}
												  endwhile;	 
												}
												 
												 if($univ_image != '')
												 	$univ_image = '<div class="universities">'.$univ_image.'</div>';
												 
												 //$field_obj = get_sub_field_object('research_type');
												// $choice = $field_obj['choices'];
												$titlecount=str_word_count(get_the_title().$univ);
												$infocount=str_word_count(strip_tags($post->post_content));
												$titlecountnew=str_word_count(iru_limit_words(get_the_title().$univ,10));
												$infocountnew=str_word_count(iru_limit_words(strip_tags($post->post_content),20));
												if($titlecount > $titlecountnew){
													$rc_title=iru_limit_words(get_the_title().$univ,10).'...';
												}else{
													$rc_title=iru_limit_words(get_the_title().$univ,10);
												}
												if($infocount > $infocountnew){
													$rc_info=iru_limit_words($post->post_content,20).'...';
												}else{
													$rc_info=iru_limit_words($post->post_content,20);
												}
												// echo $rc_title.'</br>'.$rc_info.'</br></br>';

												$content .= '<div class="research_info '.$research_type.'" data-category="'.$research_type.'">
															
															  <div class="research_info_box">
															  	  <a class="iru_onanyclick popup-modal" href="#reach-'.$post->ID.'"></a>
														  		  <h2 class="research_title">'.$rc_title.'</h2>
																  <div class="rc_information"><div class="short-info">'.$rc_info.'</div>'.$univ_image.'</div>
																  <div class="white-popup-block mfp-hide hidden_text" id="reach-'.$post->ID.'"><h2 class="research_poptitle">'.get_the_title().'<span>'.$univ.'</span></h2><p>'.$post->post_content.'</p>'.$univ_image.'</div>
													  		  </div>
															  
														  </div>';
												
												endwhile;

												wp_reset_query();
											  endif;	
											 echo '<div class="isotope">'.$content.'</div>';  
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
            <script type="text/javascript">
				jQuery(document).ready(function(e) {
                    jQuery('.research_Types li').each(function(){
						if(jQuery(this).hasClass('active')){
							jQuery(this).find('a').trigger('click');
							
						}
					});
                });
			</script>	    
<?php get_footer(); ?> 