<?php 
	global $wp_query,$post;
	
	if(is_singular('member_universities'))
	  $parent = 17;
	else if(is_home() || is_archive() || is_search() || is_single())
	  $parent = 23;
	else
	  $parent = get_parent_id($post->ID);	

	  $sidebar = get_the_sidebar($parent);
	   
	  //$sidebar = 'statistics';
	  
	  
	  
	
 if ( is_active_sidebar( $sidebar ) ) {  ?>
    <div class="col-md-4 default-page" id="sidebar-left">
		<?php do_action('before_sidebar'); ?> 	
        <?php 	dynamic_sidebar( $sidebar ); ?>
         </div>
    <?php } ?>
    
    
	
