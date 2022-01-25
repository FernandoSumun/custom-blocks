<?php

add_filter( 'render_block_core/post-featured-image', 'test_render_post_featured_image_block', 10, 2 );
function test_render_post_featured_image_block( $block_content, $block ) {

	$image_size = 'medium'; // Cambia por el tamaño que quieras mostrar

	$find = get_the_post_thumbnail_url( null, 'full' );
	$replace = get_the_post_thumbnail_url( null, $image_size );

	$block_content = str_replace( $find, $replace, $block_content );

	return $block_content;
	
}

?>
