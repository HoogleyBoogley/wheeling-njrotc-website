<?php
namespace Nimble;
if ( ! defined( 'ABSPATH' ) ) exit;
add_action( 'plugins_loaded', '\Nimble\sek_versionning');
function sek_versionning() {
    $current_version = get_option( 'nimble_version' );
    if ( $current_version != NIMBLE_VERSION ) {
        update_option( 'nimble_version_upgraded_from', $current_version );
        update_option( 'nimble_version', NIMBLE_VERSION );
    }
    $started_with = get_option( 'nimble_started_with_version' );
    if ( empty( $started_with ) ) {
        update_option( 'nimble_started_with_version', $current_version );
    }
    $start_date = get_option( 'nimble_start_date' );
    if ( empty( $start_date ) ) {
        update_option( 'nimble_start_date', date("Y-m-d H:i:s") );
    }
}
add_action('admin_menu', '\Nimble\sek_plugin_menu');
function sek_plugin_menu() {
  add_plugins_page(__( 'System infos', 'nimble-builder' ), __( 'System infos', 'nimble-builder' ), 'read', 'nimble-builder', '\Nimble\sek_plugin_page');
}

function sek_plugin_page() {
    ?>
    <div class="wrap">
      <h3><?php _e( 'System Informations', 'nimble-builder' ); ?></h3>
      <h4 style="text-align: left"><?php _e( 'Please include your system informations when posting support requests.' , 'nimble-builder' ) ?></h4>
      <textarea readonly="readonly" onclick="this.focus();this.select()" id="system-info-textarea" name="tc-sysinfo" title="<?php _e( 'To copy the system infos, click below then press Ctrl + C (PC) or Cmd + C (Mac).', 'nimble-builder' ); ?>" style="width: 800px;min-height: 800px;font-family: Menlo,Monaco,monospace;background: 0 0;white-space: pre;overflow: auto;display:block;"><?php echo sek_config_infos(); ?></textarea>
    </div>
    <?php
}





/**
 * Get system info
 * Inspired by the system infos page for Easy Digital Download plugin
 * @return      string $return A string containing the info to output
 */
function sek_config_infos() {
    global $wpdb;

    if ( !class_exists( 'Browser' ) ) {
        require_once( NIMBLE_BASE_PATH . '/inc/libs/browser.php' );
    }

    $browser = new \Browser();
    $theme_data   = wp_get_theme();
    $theme        = $theme_data->Name . ' ' . $theme_data->Version;
    $parent_theme = $theme_data->Template;
    if ( ! empty( $parent_theme ) ) {
      $parent_theme_data = wp_get_theme( $parent_theme );
      $parent_theme      = $parent_theme_data->Name . ' ' . $parent_theme_data->Version;
    }

    $return  = '### Begin System Infos (Generated ' . date( 'Y-m-d H:i:s' ) . ') ###' . "";
    $return .= "\n" .'------------ SITE INFO' . "\n";
    $return .= 'Site URL:                 ' . site_url() . "\n";
    $return .= 'Home URL:                 ' . home_url() . "\n";
    $return .= 'Multisite:                ' . ( is_multisite() ? 'Yes' : 'No' ) . "\n";
    $return .= "\n\n" . '------------ USER BROWSER' . "\n";
    $return .= $browser;

    $locale = get_locale();
    $return .= "\n\n" . '------------ WORDPRESS CONFIG' . "\n";
    $return .= 'WP Version:               ' . get_bloginfo( 'version' ) . "\n";
    $return .= 'Language:                 ' . ( !empty( $locale ) ? $locale : 'en_US' ) . "\n";
    $return .= 'Permalink Structure:      ' . ( get_option( 'permalink_structure' ) ? get_option( 'permalink_structure' ) : 'Default' ) . "\n";
    $return .= 'Active Theme:             ' . $theme . "\n";
    if ( $parent_theme !== $theme ) {
      $return .= 'Parent Theme:             ' . $parent_theme . "\n";
    }
    $return .= 'Show On Front:            ' . get_option( 'show_on_front' ) . "\n";
    if( get_option( 'show_on_front' ) == 'page' ) {
      $front_page_id = get_option( 'page_on_front' );
      $blog_page_id = get_option( 'page_for_posts' );

      $return .= 'Page On Front:            ' . ( $front_page_id != 0 ? get_the_title( $front_page_id ) . ' (#' . $front_page_id . ')' : 'Unset' ) . "\n";
      $return .= 'Page For Posts:           ' . ( $blog_page_id != 0 ? get_the_title( $blog_page_id ) . ' (#' . $blog_page_id . ')' : 'Unset' ) . "\n";
    }

    $return .= 'ABSPATH:                  ' . ABSPATH . "\n";

    $return .= 'WP_DEBUG:                 ' . ( defined( 'WP_DEBUG' ) ? WP_DEBUG ? 'Enabled' : 'Disabled' : 'Not set' ) . "\n";
    $return .= 'WP Memory Limit:          ' . ( sek_let_to_num( WP_MEMORY_LIMIT )/( 1024 ) ) ."MB" . "\n";
    $return .= "\n\n" . '------------ NIMBLE CONFIGURATION' . "\n";
    $return .= 'Version:                  ' . NIMBLE_VERSION . "\n";
    $return .= 'Upgraded From:            ' . get_option( 'nimble_version_upgraded_from', 'None' ) . "\n";
    $return .= 'Started With:             ' . get_option( 'nimble_started_with_version', 'None' ) . "\n";
    $updates = get_plugin_updates();
    $muplugins = get_mu_plugins();
    if( count( $muplugins ) > 0 ) {
      $return .= "\n\n" . '------------ MU PLUGINS' . "\n";

      foreach( $muplugins as $plugin => $plugin_data ) {
        $return .= $plugin_data['Name'] . ': ' . $plugin_data['Version'] . "\n";
      }
    }
    $return .= "\n\n" . '------------ WP ACTIVE PLUGINS' . "\n";

    $plugins = get_plugins();
    $active_plugins = get_option( 'active_plugins', array() );

    foreach( $plugins as $plugin_path => $plugin ) {
      if( !in_array( $plugin_path, $active_plugins ) )
        continue;

      $update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
      $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
    }
    $return .= "\n\n" . '------------ WP INACTIVE PLUGINS' . "\n";

    foreach( $plugins as $plugin_path => $plugin ) {
      if( in_array( $plugin_path, $active_plugins ) )
        continue;

      $update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
      $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
    }

    if( is_multisite() ) {
      $return .= "\n\n" . '------------ NETWORK ACTIVE PLUGINS' . "\n";

      $plugins = wp_get_active_network_plugins();
      $active_plugins = get_site_option( 'active_sitewide_plugins', array() );

      foreach( $plugins as $plugin_path ) {
        $plugin_base = plugin_basename( $plugin_path );

        if( !array_key_exists( $plugin_base, $active_plugins ) )
          continue;

        $update = ( array_key_exists( $plugin_path, $updates ) ) ? ' (needs update - ' . $updates[$plugin_path]->update->new_version . ')' : '';
        $plugin  = get_plugin_data( $plugin_path );
        $return .= $plugin['Name'] . ': ' . $plugin['Version'] . $update . "\n";
      }
    }
    $return .= "\n\n" . '------------ WEBSERVER CONFIG' . "\n";
    $return .= 'PHP Version:              ' . PHP_VERSION . "\n";
    $return .= 'MySQL Version:            ' . $wpdb->db_version() . "\n";
    $return .= 'Webserver Info:           ' . $_SERVER['SERVER_SOFTWARE'] . "\n";
    $return .= "\n\n" . '------------ PHP CONFIG' . "\n";
    $return .= 'Memory Limit:             ' . ini_get( 'memory_limit' ) . "\n";
    $return .= 'Upload Max Size:          ' . ini_get( 'upload_max_filesize' ) . "\n";
    $return .= 'Post Max Size:            ' . ini_get( 'post_max_size' ) . "\n";
    $return .= 'Upload Max Filesize:      ' . ini_get( 'upload_max_filesize' ) . "\n";
    $return .= 'Time Limit:               ' . ini_get( 'max_execution_time' ) . "\n";
    $return .= 'Max Input Vars:           ' . ini_get( 'max_input_vars' ) . "\n";
    $return .= 'Display Errors:           ' . ( ini_get( 'display_errors' ) ? 'On (' . ini_get( 'display_errors' ) . ')' : 'N/A' ) . "\n";
    $return .= 'PHP Arg Separator:        ' . ini_get( 'arg_separator.output' ) . "\n";
    $return .= 'PHP Allow URL File Open:  ' . ini_get( 'allow_url_fopen' ) . "\n";

    $return .= "\n\n" . '### End System Infos ###';

    return $return;
}


/**
 * Does Size Conversions
 */
function sek_let_to_num( $v ) {
    $l   = substr( $v, -1 );
    $ret = substr( $v, 0, -1 );

    switch ( strtoupper( $l ) ) {
      case 'P': // fall-through
      case 'T': // fall-through
      case 'G': // fall-through
      case 'M': // fall-through
      case 'K': // fall-through
        $ret *= 1024;
        break;
      default:
        break;
    }
    return $ret;
}
add_action( 'admin_init' , '\Nimble\sek_admin_style' );
function sek_admin_style() {
    if ( skp_is_customizing() )
      return;
    wp_enqueue_style(
        'nimble-admin-css',
        sprintf(
            '%1$s/assets/admin/css/%2$s' ,
            NIMBLE_BASE_URL,
            'nimble-admin.css'
        ),
        array(),
        NIMBLE_ASSETS_VERSION,
        'all'
    );
}
if( ! defined( 'DISPLAY_UPDATE_NOTIFICATION' ) ) { define( 'DISPLAY_UPDATE_NOTIFICATION', true ); }
add_action( 'admin_notices'                         , '\Nimble\sek_may_be_display_update_notice');
add_action( 'wp_ajax_dismiss_nimble_update_notice'  ,  '\Nimble\sek_dismiss_update_notice_action' );
add_action( 'admin_footer'                          ,  '\Nimble\sek_write_ajax_dismis_script' );
foreach ( array( 'wptexturize', 'convert_smilies', 'wpautop') as $callback ) {
  if ( function_exists( $callback ) )
      add_filter( 'sek_update_notice', $callback );
}


/**
* @hook : admin_notices
*/
function sek_may_be_display_update_notice() {
    if ( ! defined('DISPLAY_UPDATE_NOTIFICATION') || ! DISPLAY_UPDATE_NOTIFICATION )
      return;
    $last_update_notice_values  = get_option( 'nimble_last_update_notice' );
    $show_new_notice = false;
    $display_ct = 5;

    if ( ! $last_update_notice_values || ! is_array($last_update_notice_values) ) {
        $last_update_notice_values = array( "version" => NIMBLE_VERSION, "display_count" => 0 );
        update_option( 'nimble_last_update_notice', $last_update_notice_values );
        if ( sek_user_started_before_version( NIMBLE_VERSION ) ) {
            $show_new_notice = true;
        }
    }

    $_db_version          = $last_update_notice_values["version"];
    $_db_displayed_count  = $last_update_notice_values["display_count"];
    if ( version_compare( NIMBLE_VERSION, $_db_version , '>' ) ) {
        if ( $_db_displayed_count < $display_ct ) {
            $show_new_notice = true;
            (int) $_db_displayed_count++;
            $last_update_notice_values["display_count"] = $_db_displayed_count;
            update_option( 'nimble_last_update_notice', $last_update_notice_values );
        }
        else {
            $new_val  = array( "version" => NIMBLE_VERSION, "display_count" => 0 );
            update_option('nimble_last_update_notice', $new_val );
        }//end else
    }//end if

    if ( ! $show_new_notice )
      return;

    ob_start();
      ?>
      <div class="updated czr-update-notice" style="position:relative;">
        <?php
          printf('<h3>%1$s %2$s %3$s %4$s :D</h3>',
              __( "Thanks, you successfully upgraded", 'nimble-builder'),
              'Nimble Builder',
              __( "to version", 'nimble-builder'),
              NIMBLE_VERSION
          );
        ?>
        <?php
          printf( '<h4>%1$s <a class="" href="%2$s" title="%3$s" target="_blank">%3$s &raquo;</a></h4>',
              __( "We'd like to introduce the new features we've been working on.", 'nimble-builder'),
              "https://presscustomizr.com/category/nimble-releases/",
              __( "Read the latest release notes" , 'nimble-builder' )
          );
        ?>
        <p style="text-align:right;position: absolute;font-size: 1.1em;<?php echo is_rtl()? 'left' : 'right';?>: 7px;bottom: -6px;">
        <?php printf('<a href="#" title="%1$s" class="nimble-dismiss-update-notice"> ( %1$s <strong>X</strong> ) </a>',
            __('close' , 'nimble-builder')
          );
        ?>
        </p>
        <!-- <p>
          <?php
          ?>
        </p> -->
      </div>
      <?php
    $_html = ob_get_contents();
    if ($_html) ob_end_clean();
    echo apply_filters( 'sek_update_notice', $_html );
}


/**
* hook : wp_ajax_dismiss_nimble_update_notice
* => sets the last_update_notice to the current Hueman version when user click on dismiss notice link
*/
function sek_dismiss_update_notice_action() {
    check_ajax_referer( 'dismiss-update-notice-nonce', 'dismissUpdateNoticeNonce' );
    $new_val  = array( "version" => NIMBLE_VERSION, "display_count" => 0 );
    update_option( 'nimble_last_update_notice', $new_val );
    wp_die();
}



/**
* hook : admin_footer
*/
function sek_write_ajax_dismis_script() {
    ?>
    <script type="text/javascript" id="nimble-dismiss-update-notice">
      ( function($){
        var _ajax_action = function( $_el ) {
            var AjaxUrl = "<?php echo admin_url( 'admin-ajax.php' ); ?>",
                _query  = {
                    action  : 'dismiss_nimble_update_notice',
                    dismissUpdateNoticeNonce :  "<?php echo wp_create_nonce( 'dismiss-update-notice-nonce' ); ?>"
                },
                $ = jQuery,
                request = $.post( AjaxUrl, _query );

            request.fail( function ( response ) {
              console.log('response when failed : ', response);
            });
            request.done( function( response ) {
              console.log('RESPONSE DONE', $_el, response);
              if ( '0' === response )
                return;
              if ( '-1' === response )
                return;

              $_el.closest('.updated').slideToggle('fast');
            });
        };//end of fn
        $( function($) {
          $('.nimble-dismiss-update-notice').click( function( e ) {
            e.preventDefault();
            _ajax_action( $(this) );
          } );
        } );

      } )( jQuery );


    </script>
    <?php
}