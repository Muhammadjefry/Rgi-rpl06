<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit();
}

/**
 * Get between function.
 *
 * @param string $var1 Frist -.
 * @param string $var2 Second -.
 * @param string $pool Note image ID.
 */
function dia_get_between( $var1 = '', $var2 = '', $pool ) {
	$temp1  = strpos( $pool, $var1 ) + strlen( $var1 );
	$result = substr( $pool, $temp1, strlen( $pool ) );
	$dd     = strpos( $result, $var2 );
	if ( 0 === $dd ) {
		$dd = strlen( $result );
	}
	return substr( $result, 0, $dd );
}

/**
 * Sanitize Array function.
 *
 * @param string $array_or_string Array or string.
 */
function dia_sanitize_text_or_array_field( $array_or_string ) {
	if ( is_string( $array_or_string ) ) {
		$array_or_string = sanitize_text_field( $array_or_string );
	} elseif ( is_array( $array_or_string ) ) {
		foreach ( $array_or_string as $key => &$value ) {
			if ( is_array( $value ) ) {
				$value = dia_sanitize_text_or_array_field( $value );
			} else {
				$value = sanitize_text_field( $value );
			}
		}
	}

	return $array_or_string;
}

/**
 * Is Valid Maxlength function.
 *
 * @param string $maxlength Maxlength number.
 */
function dia_is_valid_maxlength( $maxlength ) {
	$max = 300;
    if ( absint($maxlength) <= $max ) {
        return absint($maxlength);
    }else{
		return absint($max);
	}
}

/**
 * Metabox open function.
 *
 * @param string  $title Metabox title.
 * @param string  $id Metabox ID.
 * @param boolean $expand Expand or collapse.
 */
function dia_metabox_open( $title, $id, $expand ) {
	$expand = true === $expand ? '' : 'closed';
	echo '<div>';
	echo '<div class="metabox-holder">';
	echo '<div class="postbox-container" style="width:100%;">';
	echo '<div class="meta-box-sortables ui-sortable">';
	echo '<div id="' . esc_attr( $id ) . '" class="postbox ' . esc_attr( $expand ) . '">';
	echo '<div class="postbox-header">';
	echo '<h2 class="hndle ui-sortable-handle"><span>' . esc_html( $title ) . '</span></h2>';
	echo '<div class="handle-actions hide-if-no-js">';
	echo '<button type="button" class="handlediv" aria-expanded="false"><span class="screen-reader-text">' . esc_html( $title ) . '</span><span class="toggle-indicator" aria-hidden="true"></span></button>';
	echo '</div>';
	echo '</div>';
	echo '<div class="inside">';
}

/**
 * Metabox close function.
 */
function dia_metabox_close() {
	echo '</div></div></div></div></div></div>';
}

