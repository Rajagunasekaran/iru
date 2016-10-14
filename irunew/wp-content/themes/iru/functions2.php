<?php
function get_parent_title($post_id = 0){
	global $wp_query;
	$post = get_post($post_id);	
	if($post->post_parent == 0){
		return $post->post_title;		
	}else{
	  return get_parent_title($post->post_parent);
	}
}

function get_parent_id($post_id = 0){
	global $wp_query;
	$post = get_post($post_id);	
	if($post->post_parent == 0){
		return $post->ID;		
	}else{
	  return get_parent_id($post->post_parent);
	}
}

function get_parent_zero_id($post_id = 0){
	global $wp_query,$post;	
	if(is_page())
	return $post->post_parent;	
}

add_action('init', 'create_post_type_location');

// Create 1 Custom Post type for a Demo, called HTML5-Blank
function create_post_type_location()
{
    // register_taxonomy_for_object_type('tours', 'location'); // Register Taxonomies for Category
 	//  register_taxonomy_for_object_type('post_tag', 'location');
 
 

	
	
    register_post_type('member_universities', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Members', 'member_universities'), // Rename these to suit
            'singular_name' => __('Members', 'member_universities'),
            'add_new' => __('Add New', 'location'),
            'add_new_item' => __('Add New Universities', 'member_universities'),
            'edit' => __('Edit Universities', 'location'),
            'edit_item' => __('Edit Universities', 'member_universities'),
            'new_item' => __('New CUniversities', 'member_universities'),
            'view' => __('View Universities', 'member_universities'),
            'view_item' => __('View Universities', 'member_universities'),
            'search_items' => __('Search Universities', 'member_universities'),
            'not_found' => __('No Universitiesfound', 'member_universities'),
            'not_found_in_trash' => __('No Universities found in Trash', 'member_universities')
        ),
		'slug' => 'locations',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        
    ));
	
	register_post_type('research_strengths', // Register Custom Post Type
        array(
        'labels' => array(
            'name' => __('Research', 'research_strengths'), // Rename these to suit
            'singular_name' => __('Research', 'research_strengths'),
            'add_new' => __('Add New', 'Research'),
            'add_new_item' => __('Add New Research', 'research_strengths'),
            'edit' => __('Edit Research', 'Research'),
            'edit_item' => __('Edit Research', 'research_strengths'),
            'new_item' => __('New Research', 'research_strengths'),
            'view' => __('View Research', 'research_strengths'),
            'view_item' => __('View Research', 'research_strengths'),
            'search_items' => __('Search Research', 'research_strengths'),
            'not_found' => __('No Research found', 'research_strengths'),
            'not_found_in_trash' => __('No Research found in Trash', 'research_strengths')
        ),
		'slug' => 'research_strengths',
        'public' => true,
        'hierarchical' => true, // Allows your posts to behave like Hierarchy Pages
        'has_archive' => true,
        'supports' => array(
            'title',
            'editor',
            'excerpt',
            'thumbnail'
        ), // Go to Dashboard Custom HTML5 Blank post for supports
        'can_export' => true, // Allows export in Tools > Export
        
    ));
}

function map_location(){
	$content = '';
	$ajax_url = home_url().'/wp-admin/admin-ajax.php?action=iru&method=locations&location=';
	$content .= '<img class="maps_section" src="'.get_stylesheet_directory_uri().'/img/locations-map.png" usemap="#Map" alt="Member locations" />
					<map name="Map">
  <area shape="rect" coords="0,244,111,297" data-location="275" class="simple-ajax-popup"  href="'.$ajax_url.'275">
  <area shape="rect" coords="204,262,313,319" data-location="222"  class="simple-ajax-popup"  href="'.$ajax_url.'222">
  <area shape="rect" coords="335,315,421,377" data-location="273" class="simple-ajax-popup"  href="'.$ajax_url.'273">
  <area shape="rect" coords="415,185,519,252" data-location="225" class="simple-ajax-popup"  href="'.$ajax_url.'225">
  <area shape="rect" coords="358,81,466,134" data-location="227" class="simple-ajax-popup"  href="'.$ajax_url.'227">
  <area shape="rect" coords="168,6,275,59" data-location="220"  class="simple-ajax-popup"  href="'.$ajax_url.'220">
</map>
	<!--<map name="Map">
	  <area shape="circle" coords="77,260,9" data-location="275" class="simple-ajax-popup"  href="'.$ajax_url.'275">
	  <area shape="circle" coords="298,291,7" data-location="222"  class="simple-ajax-popup"  href="'.$ajax_url.'222">
	  <area shape="circle" coords="346,321,7" data-location="273" class="simple-ajax-popup"  href="'.$ajax_url.'273">	  
	  <area shape="circle" coords="438,221,19" data-location="225" class="simple-ajax-popup"  href="'.$ajax_url.'225">
	  <area shape="circle" coords="378,102,19" data-location="227" class="simple-ajax-popup"  href="'.$ajax_url.'227">
	  <area shape="circle" coords="214,40,7" data-location="220"  class="simple-ajax-popup"  href="'.$ajax_url.'220">
	</map>-->';
	
	$args = array('post_type' => 'member_universities','posts_per_page' => -1,'post_status' => 'publish');
	query_posts($args);
	$locations = '';
	global  $post;
	if(have_posts()):
		while(have_posts()): the_post();
			$locations .= '<h2><a data-location="'.$post->ID.'" class="simple-ajax-popup" href="'.$ajax_url.$post->ID.'">'.get_the_title().'</a></h2>';
		endwhile;
		wp_reset_query();
	endif;
	
	if($locations != '')
		$content .= '<div class="hidelocation">'.$locations.'</div>';
	return $content;
	
}
add_shortcode('location_map','map_location');

function get_location($post_id = ''){
	
	$title = get_the_title($post_id);
	$logo = get_field('university_logo',$post_id);
	$vice_chancellor = get_field('vice_chancellor_name',$post_id);
	$vc_image = get_field('vice_chancellor_image',$post_id);
	$website = get_field('website',$post_id);
	$biography = get_field('biography',$post_id);
	$page_data = get_page( $post_id );
	$content = $page_data->post_content;
	
	$content .= '<div id="custom-content" class="white-popup-block">
				  <div class="containers">
   					<div class="col-md-3 logo" style="background-image:url('.$logo.');">&nbsp;</div>
					<div class="col-md-3 chaiman"><img src="'.$vc_image.'" alt="" /></div>
					<div class="col-md-6 info right">
						<h3>'.$title.'</h3>
						<p><b>'.$vice_chancellor.'</b><br />Vice Chancellor</p>
						<p><b>Biography</b><br /> <a href="'.$biography.'" target="_blank">Download Biography</a></p>
						<p><b>Website</b><br /><a target="_blank" href="'.$website.'">'.$website.'</a></p>
					</div>
					<div class="entry-content">'.apply_filters('the_content',$content).'<div class="clearfix"></div></div>
				  </div>	
				 </div>';
	return $content;	
}

function research_types(){
	global $post;
	$content_menu = "";
	$content_tab = "";
	$i = 0;
	if(have_rows('research')):
		while(have_rows('research')): the_row();
			$icon = get_sub_field('icon');
			$research_type = get_sub_field('research_type');
			$about_research = get_sub_field('about_research');
			$research_banner = get_sub_field('research_banner');
			$field_obj = get_sub_field_object('research_type');
			$choice = $field_obj['choices'];
			$class = '';
			if($i == 0)
				$class ='active';
				
			$menu = '';
			if($icon != '')
				$menu = '<a href="#'.$research_type.'" data-filter="'.$research_type.'" data-class="'.$research_type.'">
								<img src="'.$icon.'" alt="'.$choice[$research_type].'"/><span>'.$choice[$research_type].'</span></a>
								<img class="up-triangle" src="'.get_template_directory_uri().'/images/research-strengths-up.png">';
			$content_menu .= '<li class="menuitem '.$research_type.' '.$class.'">'.$menu.'</li>';
			
			$content_tab .= '<div class="contenttab '.$research_type.' '.$class.'">
							 	<div class="descriptions">
									<h2>'.$choice[$research_type].'</h2>
									<p class="italic">'.$about_research.'</p>
								</div>
								<div class="rc_banner" style="background-image:url('.$research_banner.')">&nbsp;</div>
							 </div>';
				$i++;			 
		endwhile;
	endif;	
	
	if($content_menu != '')
			$content_menu = '<ul id="filters" class="research_Types">'.$content_menu.'</ul>';
			
	if(	$content_tab != ''){
			$content_tab = '<div class="content_Tabs">'.$content_tab.'</div>';
	}
	return $content_menu.$content_tab;
	
	
}
?>