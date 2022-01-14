<?php

function get_tarjeta( $titulo, $resumen = false, $url = false, $id_imagen = false, $target = '_self', $post_id = false ) {

	$r = '';

	$background_dim = '';
	$text_color = 'has-black-color has-text-color';
	$post_type = get_post_type( $post_id );

	if ( $id_imagen ) {
		$background_dim = 'has-background-dim';
		$text_color = '';
	}

	if ( $url ) {
		
		$r .= '<a href="'.$url.'" target="'.$target.'" class="wp-block-cover '.$background_dim.' aessia-card">';

	} else {

		$r .= '<div class="wp-block-cover '.$background_dim.' aessia-card">';
	}

		if ( $id_imagen ) {
			$r .= wp_get_attachment_image( $id_imagen, 'medium_large', false, array('class' => 'wp-block-cover__image-background') );
		}

		$r .= '<div class="wp-block-cover__inner-container '.$text_color.'">';

			$r .= '<div class="">';

				if ( is_search() ) {
					$post_type_obj = get_post_type_object( get_post_type( $post_id ) );
					$r .= '<div class="has-antetitulo-font-size">'.$post_type_obj->labels->singular_name.'</div>';
				}

				$r .= '<h2 class="aessia-card-title">';

					if ( 'prestador' == $post_type ) {

						$r .= '<a href="'.get_the_permalink( $post_id ).'" title="'.$titulo.'">'.$titulo.'</a>';

					} else {

						$r .= $titulo;

					}

				$r .= '</h2>';

				if ( $resumen ) {
					$r .= $resumen;
				}

			$r .= '</div>';

			if ( $url ) $r .= '<span class="flecha"></span>';

		$r .= '</div>';

	if ( $url ) {
		$r .= '</a>';
	} else {
		$r .= '</div>';
	}

	return $r;

}

?>
