<?php
/**
 * Auto Hosted Theme Updater Class
 *
 * This class handles automatic updates for a custom-hosted WordPress theme.
 * 
 * @version 0.1.4
 */
class Grassroots_Theme_Updater {

    /**
     * Class Constructor
     *
     * @since 0.1.0
     */
    public function __construct() {
        add_action( 'after_setup_theme', array( $this, 'updater_setup' ), 15 );
        add_action( 'admin_init', array( $this, 'clear_transient_cache' ) );
        add_filter('site_transient_update_themes', [ $this, 'prevent_theme_update' ]);
        add_action( 'wp_prepare_themes_for_js', [ $this, 'customize_theme_update_message' ] );
    }

    public function customize_theme_update_message( $data ) {
        $status = get_option( 'grassroots_license_status', '' );

        if ( 'no_download' !== $status && ! empty( $status ) ) {
            return $data;
        }

        if ( empty( $data['grassroots'] ) || empty( $data['grassroots']['update'] ) ) {
            return $data;
        }

        if ( empty( $data['grassroots']['hasUpdate'] ) ) {
            return $data;
        }

        if ( ! current_user_can( 'update_themes' ) ) {
            return $data;
        }

        if ( strpos( $data['grassroots']['update'], 'Automatic update is unavailable for this theme.' ) !== false ) {

            // Replace the default message with your custom message
            $custom_message = sprintf(
                __( 'Your renewal period has expired. Please <a href="%s" target="_blank">renew your license</a> to get the latest updates.', 'grassroots' ),
                esc_url( 'https://www.organizedthemes.com/account/member' )
            );

            // Update the message
            $data['grassroots']['update'] = str_replace(
                'Automatic update is unavailable for this theme.',
                $custom_message,
                $data['grassroots']['update']
            );
        }
       
       return $data;
    }
    
    public function prevent_theme_update( $transient ) {
        $status = get_option( 'grassroots_license_status', '' );

        if ( 'no_download' !== $status && ! empty( $status ) ) {
            return $transient;
        }

        $theme_slug = 'grassroots';
        
        if (
            ! empty( $transient->response[$theme_slug]['package'] ) ||
            ! empty( $transient->response[$theme_slug]->package )
        ) {
            if( is_array( $transient->response[$theme_slug] ) ) {
                $transient->response[$theme_slug]['package'] = null;
            } else {
                $transient->response[$theme_slug]->package = null;
            }
        }

        return $transient;
    }

    /**
     * Clear transient cache
     * 
     * @since 0.1.0
     */
    public function clear_transient_cache() {
        if ( empty( $GLOBALS['pagenow'] ) ) {
            return;
        }

        if ( ! is_multisite() ) {
            return;
        }

        if ( 
            $GLOBALS['pagenow'] == 'update-core.php' ||
            $GLOBALS['pagenow'] === 'themes.php' ||
            ( $GLOBALS['pagenow'] === 'themes.php' && isset( $_GET['page'] ) && $_GET['page'] === 'grassroots-license' )
        ) {
            wp_clean_update_cache();
            wp_update_themes();
            wp_update_plugins();
        }
    }

    /**
     * Setup updater
     * 
     * @since 0.1.0
     */
    public function updater_setup() {
        /* Disable request to WordPress.org repository */
        add_filter( 'http_request_args', array( $this, 'disable_wporg_request' ), 5, 2 );

        add_filter('pre_set_site_transient_update_themes', array($this, 'transient_update_themes'));        
    }

    /**
     * Disable request to WordPress.org theme repository
     *
     * @since 0.1.2
     */
    public function disable_wporg_request( $r, $url ) {
        if ( strpos( $url, 'http://api.wordpress.org/themes/update-check' ) === 0 ) {
            $themes = unserialize( $r['body']['themes'] );
            unset( $themes[ get_option( 'template' ) ] );
            $r['body']['themes'] = serialize( $themes );
        }
        return $r;
    }

    /**
     * Updater Data
     * 
     * @since 0.1.0
     */
    public function updater_data() {
        $theme_support = get_theme_support( 'auto-hosted-theme-updater' );
        $user_config = is_array( $theme_support[0] ) ? $theme_support[0] : false;

        $defaults = array(
            'repo_uri'    => '',
            'repo_slug'   => '',
            'key'         => '',
            'username'    => false,
            'autohosted'  => 'theme.0.1.4',
        );

        $config = wp_parse_args( $user_config, $defaults );

        $theme_data = wp_get_theme( get_template() );

        return array(
            'repo_uri'   => trailingslashit( esc_url_raw( $config['repo_uri'] ) ),
            'repo_slug'  => sanitize_title( $config['repo_slug'] ),
            'login'      => $config['username'],
            'key'        => md5( $config['key'] ),
            'slug'       => get_template(),
            'name'       => esc_attr( $theme_data->get( 'Name' ) ),
            'version'    => esc_attr( $theme_data->get( 'Version' ) ),
            'uri'        => esc_url_raw( $theme_data->get( 'ThemeURI' ) ),
            'domain'     => home_url(),
            'autohosted' => esc_attr( $config['autohosted'] ),
        );
    }

    /**
     * Check for theme updates
     * 
     * @since 0.1.0
     */
    public function transient_update_themes( $checked_data ) {
        global $wp_version;

        if ( empty( $checked_data->checked ) ) {
            return $checked_data;
        }

        $username = get_option( 'grassroots_username', '' );
        $password = get_option( 'grassroots_password', '' );

        if ( empty( $username ) || empty( $password ) ) {
            return $checked_data;
        }

        /* API URL for theme updates */
        $remote_url = add_query_arg( [
            'theme-slug' => 'grassroots',
            'username'   => $username,
            'password'   => $password
        ], 'https://www.organizedthemes.com/wp-json/theme-update/v1/updates' );

        $remote_request = array(
            'timeout'    => 20,
            'user-agent' => 'WordPress/' . $wp_version . '; ' . home_url()
        );

        /* Make the remote call to check for updates */
        $raw_response = wp_remote_get( $remote_url, $remote_request );

        /* Check for errors in the response */
        if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
            return $checked_data;
        }

        /* Decode the response */
        $response = json_decode( wp_remote_retrieve_body( $raw_response ), true );
        $response = ! empty( $response[ 0 ] ) ? $response[ 0 ] : [];

        $current_version = wp_get_theme( 'grassroots' )->get( 'Version' );

        /* Process the response */
        if ( isset( $response['version'] ) && ! empty( $response['version'] ) && isset( $response['file'] ) && ! empty( $response['file'] ) ) {
            if ( version_compare( $current_version, $response['version'], '<' ) ) {
                
                $updates = array(
                    'new_version' => esc_attr( $response['version'] ),
                    'package'     => ! empty( $response['disable_download'] ) ? '' : esc_url_raw( $response['file'] ),
                    'url'         => 'https://www.organizedthemes.com/themes/grassroots/',
                );
    
                if ( !isset( $checked_data->response ) ) {
                    $checked_data->response = array();
                }

                if ( ! empty( $response['disable_download'] ) ) {
                    update_option( 'grassroots_license_status', 'no_download' );
                }

                $checked_data->response['grassroots'] = $updates;
            }
        
        }

        return $checked_data;
    }
}
