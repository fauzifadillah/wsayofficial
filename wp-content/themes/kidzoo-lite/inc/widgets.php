<?php
/*
@package kidzoo-lite
  =================
  WIDGET CLASS
  =================
*/

//Edit default wordpress widgets
function kidzoo_tag_cloud_font_change( $args ){

  $args['smallest'] = 10;
  $args['largest'] = 10;

  return $args;

}
add_filter( 'widget_tag_cloud_args', 'kidzoo_tag_cloud_font_change');

function kidzoo_list_categories_output_change( $links ) {
    if($links == '</a> <span>' ){
        return;
    }
    else{
    	$links = str_replace('(', '<span class="post_count">', $links);
    	$links = str_replace(')', '</span>', $links);
    }

	return $links;

}
add_filter( 'wp_list_categories', 'kidzoo_list_categories_output_change' );

function kidzoo_archive_postcount_filter ($links) {
    if (strpos($links, '<option') == false) {
        $links = str_replace('(', '<span class="count">', $links);
        $links = str_replace(')', '</span>', $links);
    }
    return $links;
}
add_filter('get_archives_link', 'kidzoo_archive_postcount_filter');
