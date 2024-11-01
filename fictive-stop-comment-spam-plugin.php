<?

/**
 * Plugin Name: Stop Comment Spam - Fictive Web
 * Plugin URI: http://www.fictiveweb.com
 * Description: A really simple plugin to stop comment spam
 * Version: 1.0.0
 * Author: Michael Bonner (Fictive Web)
 * Author URI: http://www.fictiveweb.com
 * License: Proprietary
 */

// check to see if the hidden input exists in submission
function fictive_preprocess_new_comment($commentdata) {
	if(!isset($_POST['is_legit'])) {
		die();
	}
	return $commentdata;
}
add_action('preprocess_comment', 'fictive_preprocess_new_comment');

// add hidden field to form
function fictive_add_field_to_comment_form() {
	?>
	<script>
	jQuery( document ).ready( function($) {
		$('#commentform').prepend('<input type="hidden" name="is_legit" value="1" />');
	});
	</script>
	<?
}
add_action( 'wp_footer', 'fictive_add_field_to_comment_form' );