<?php
/*
Plugin Name: Remove Tesseract Footer Credit
Version: 1.0
Plugin URI: https://upwerd.com/remove-tesseract-footer-credit/
Description: A simple plugin to remove or modify Tesseract footer credits
Author: Joe Bill
Author URI: https://upwerd.com
License: GPLv2 or later
Text Domain: remove-tesseract-footer-credit
*/

/*
Copyright 2016 Joe Bill

This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/

//Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/*
* Add a submenu under Tools
*/
function jabrtfc_admin_menu() {
	$page = add_submenu_page( 'tools.php', 'Remove Tesseract Footer Credit', 'Remove Tesseract Footer Credit', 'activate_plugins', 'remove-tesseract-footer-credit', 'jabrtfc_options_page' );
}

function jabrtfc_options_page() {
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$_POST = stripslashes_deep( $_POST );

		update_option( 'jabrtfc_content', $_POST['content'] );

		echo '<div id="message" class="updated fade">';
			echo '<p><strong>Content Saved</strong></p>';
		echo '</div>';
	}
?>

<div class="wrap" style="padding-bottom:5em;">
	<h2>Remove Tesseract Footer Credit</h2>

	<form method="post" action="<?php echo $_SERVER["REQUEST_URI"]; ?>" style="float: left; width:65%;">
		<?php $content = get_option( 'jabrtfc_content' ); ?>
		<?php wp_editor( $content, 'content', $settings = array('quicktags' => true, 'wpautop' => false,'editor_height' => '150', 'teeny' => false) ); ?>
<br>
		<input type="submit" class="button" value="Save" />
	</form>
	<div style="float: right;-align: top; margin-top: 10px; margin-left: 1%;padding: 0 1.5% 1.5% 1.5%;width:30%;background-color: #eee; height: 100%; border: 1px solid #e4e4e4">
		<h3>Get Help</h3>
		<p>Need help using this plugin or want to report a bug? Contact me <a href="https://upwerd.com/#help">here</a>.</p>
		<hr>
		<h3>Learn</h3>
		<p><a href="https://upwerd.com/remove-tesseract-footer-credit/">Click here</a> to view instructions on how to use this plugin.</p>
		<hr>
		<h3>Donate</h3>
		<p>If you have found this plugin useful, please support me by donating or linking to my website. Thank you for your support.</p>
		<form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
			<input type="hidden" name="cmd" value="_s-xclick">
			<input type="hidden" name="hosted_button_id" value="ZRZBT9ZS7DJT8">
			<input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donate_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
			<img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
		</form>
		<hr>
		<h3>Link</h3>
		<p>Copy the text below and paste somewhere on your website</p>
		<textarea style="width:100%" rows="5">I <?php echo htmlentities('&hearts;') ?> the <a href="https://upwerd.com/remove-tesseract-footer-credit">Remove Tesseract Footer Credit Plugin</a></textarea>

	</div>
	<br>

</div>

<?php }

add_action( 'init', 'jabrtfc_custom_remove_footer_credit', 10 );

function jabrtfc_custom_remove_footer_credit () {
	remove_action( 'tesseract_footer_branding', 'tesseract_footer_branding_output', 10 );
	add_action( 'tesseract_footer_branding', 'jabrtfc_custom_footer_credit', 10 );
}

function jabrtfc_custom_footer_credit() {
	$content = get_option( 'jabrtfc_content' );
	echo '<div id="footer-banner-right" class="designer"><div class="table"><div class="table'.'-cell">';
	echo $content;
	echo '</div></div></div>';
}


//Add left menu item in admin
add_action( 'admin_menu', 'jabrtfc_admin_menu' );