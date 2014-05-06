<?php


register_nav_menu('primary', 'Primary Menu');


add_theme_support('post-thumbnails'); 

add_image_size('velo-frontpage', 360, 202);



function velo_thumbnail( $html, $post_id, $post_image_id ) {
	global $post;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'velo-frontpage' );
	$html = '<img class="velo-image" src="'.$image[0].'" alt="'.esc_attr( get_post_field('post_title', $post_id )).'" />';
	return $html;
}
add_filter( 'post_thumbnail_html', 'velo_thumbnail', 10, 3 );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
	global $post;
	return '<a class="btn btn-default" role="button" href="'. get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function my_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}
add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );

?>