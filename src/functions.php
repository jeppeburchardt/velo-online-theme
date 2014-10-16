<?php

function init_menus() {
	register_nav_menu('primary', __('Primary Menu'));
	register_nav_menu('categories', __('Categories'));	
}

add_theme_support('post-thumbnails'); 

add_image_size('velo-frontpage', 360, 202, true);
add_image_size('velo-article', 698, 350, true);

add_action('init', 'init_menus');

function velo_thumbnail( $html, $post_id, $post_image_id ) {
	global $post;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'velo-frontpage' );
	$html = '<img class="velo-image" src="'.$image[0].'" alt="'.esc_attr( get_post_field('post_title', $post_id )).'" />';
	return $html;
}
function velo_article_image() {
	global $post;
	$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'velo-article' );
	$html = '<img class="velo-image" src="'.$image[0].'" alt="'.esc_attr( get_post_field('post_title', $post_id )).'" />';
	return $html;
}
add_filter( 'post_thumbnail_html', 'velo_thumbnail', 10, 3 );

function velo_seo_doctype ($output) {
	return $output . ' xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml"';
}
function velo_seo_head () {
	global $post;
	if (is_singular()) {
		setup_postdata($post);
		$url = esc_attr(get_permalink());
		$site = esc_attr(get_bloginfo('name'));
		$description = esc_attr(strip_tags(get_the_excerpt()));
		$title = esc_attr(get_the_title());
		$thumb = has_post_thumbnail($post->ID) ? esc_attr(wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'medium')[0]) : '';
	} else {
		//front-page or pther:
		$title = $site = esc_attr(get_bloginfo('name'));
		$description = esc_attr(get_bloginfo('description'));
		$url = '';
		$thumb = '';
	}
	//post:
	echo '<meta name="description" content="'.$description.'">';

	echo '<link rel="canonical" href="'.$url.'" />';
	echo '<meta property="og:site_name" content="'.$site.'" />';
	echo '<meta property="og:url" content="'.$url.'" />';
	echo '<meta property="og:title" content="'.$title.'" />';
	echo '<meta property="og:description" content="'.$description.'" />';
	echo '<meta property="og:image" content="'.$thumb.'" />';

	echo '<meta name="twitter:card" content="summary_large_image" />';
	echo '<meta name="twitter:domain" content="kosmobot.dk" />';
	echo '<meta name="twitter:site" content="@veloonlinech" />';
	echo '<meta name="twitter:title" content="'.$title.'" />';
	echo '<meta name="twitter:description" content="'.$description.'" />';
	echo '<meta name="twitter:image" content="'.$thumb.'" />';
	
	echo '<meta property="og:type" content="article"/>';
	echo '<meta property="og:url" content="'.$url.'"/>';
	echo '<meta property="og:site_name" content="'.$name.'"/>';
}
add_filter('language_attributes', 'velo_seo_doctype');
add_action('wp_head', 'velo_seo_head');


//theme widgets:
//class PostTeasers extends WP_Widget {
//	function PostTeasers() {
//		parent::WP_Widget(false, 'Post teasers');
//	}
//function form($instance) {
//		// outputs the options form on admin
//	}
//function update($new_instance, $old_instance) {
//		// processes widget options to be saved
//		return $new_instance;
//	}
//function widget($args, $instance) {
//		// outputs the content of the widget
//	}
//}
//register_widget('PostTeasers');

//sidebar:
register_sidebar( array(
    'id'          => 'content-sidebar',
    'name'        => __( 'Content sidebar', $text_domain ),
    'description' => __( 'This sidebar is located to the right of an article.', $text_domain ),
) );


// Replaces the excerpt "more" text by a link
function new_excerpt_more($more) {
	global $post;
	return '<a class="btn btn-default" role="button" href="'. get_permalink($post->ID) . '"> Read more</a>';
}
add_filter('excerpt_more', 'new_excerpt_more');


function velo_wp_nav_menu_args( $args = '' ) {
	$args['container'] = false;
	return $args;
}
add_filter('wp_nav_menu_args', 'velo_wp_nav_menu_args');


// add category nicenames in body and post class
function valo_category_id_class($classes) {
    global $post;
    foreach((get_the_category($post->ID)) as $category)
        $classes[] = $category->category_nicename;
    return $classes;
}
add_filter('post_class', 'valo_category_id_class');


?>