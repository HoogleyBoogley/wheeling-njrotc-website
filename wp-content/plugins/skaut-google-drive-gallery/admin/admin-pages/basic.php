<?php
namespace Sgdg\Admin\AdminPages\Basic;

require_once __DIR__ . '/basic/oauth-grant.php';
require_once __DIR__ . '/basic/oauth-revoke.php';
require_once __DIR__ . '/basic/root-selection.php';

if ( ! is_admin() ) {
	return;
}

function register() {
	add_action( 'admin_menu', '\\Sgdg\\Admin\\AdminPages\\Basic\\add' );
	if ( ! get_option( 'sgdg_access_token' ) ) {
		OAuthGrant\register();
	} else {
		OAuthRevoke\register();
		RootSelection\register();
	}
}

function add() {
	add_submenu_page( 'sgdg_basic', __( 'Basic options', 'skaut-google-drive-gallery' ), esc_html__( 'Basic options', 'skaut-google-drive-gallery' ), 'manage_options', 'sgdg_basic', '\\Sgdg\\Admin\\AdminPages\\Basic\\html' );
}

function html() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}

	$help_link = 'https://napoveda.skaut.cz/dobryweb/' . substr( get_locale(), 0, 2 ) . '-skaut-google-drive-gallery';
	// translators: 1: Start of a help link 2: End of the help link
	add_settings_error( 'general', 'help', sprintf( esc_html__( 'See the %1$sdocumentation%2$s for more information about how to configure the plugin.', 'skaut-google-drive-gallery' ), '<a href="' . esc_url( $help_link ) . '" target="_blank">', '</a>' ), 'notice-info' );

	settings_errors();
	echo( '<div class="wrap">' );
	echo( '<h1>' . esc_html( get_admin_page_title() ) . '</h1>' );
	echo( '<form action="options.php?action=update&option_page=sgdg_basic" method="post">' );
	wp_nonce_field( 'sgdg_basic-options' );
	do_settings_sections( 'sgdg_basic' );
	submit_button( esc_html__( 'Save Changes', 'skaut-google-drive-gallery' ) );
	echo( '</form>' );
	echo( '</div>' );
}
