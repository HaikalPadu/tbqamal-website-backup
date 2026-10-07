<?php

/**
 * Theme License Class
 * 
 * This class handles the theme license page and options.
 */
class Grassroots_Theme_License {

    public function __construct() {
        if ( ! is_admin() ) {
            return;
        }
        
        add_action( 'admin_menu', [ $this, 'adding_grassroots_license_page' ] );
        add_action( 'admin_init', [ $this, 'grassroots_register_option'  ] );
        add_action( 'admin_init', [ $this, 'license_action' ] );
        add_action( 'admin_notices', [ $this, 'grassroots_license_notice' ] );
        add_action( 'admin_notices', [ $this, 'show_activation_notice' ] );
        add_action( 'wp_ajax_dismiss_grassroots_license_notice', [ $this, 'dismiss_grassroots_license_notice' ] );
        add_action( 'wp_ajax_grassroots_remove_credentials', [ $this, 'remove_credentials' ] );
        add_action( 'wp_ajax_dismiss_grassroots_activation_notice', [$this, 'dismiss_grassroots_activation_notice' ] );
    }

    public function show_activation_notice() {
        // Get the theme license status
        $status = get_option('grassroots_license_status', '');
    
        // Check if the user is on the grassroots license page
        $current_screen = get_current_screen();
        if ($current_screen->base === 'appearance_page_grassroots-license') {
            return; // Don't show the notice on the grassroots-license page
        }
    
        // Get the user's dismissal status
        $user_id = get_current_user_id();
        $is_dismissed = get_user_meta($user_id, 'grassroots_license_activation_notice_dismissed', true);
    
        // Only show the notice if the license is not valid and the notice hasn't been dismissed
        if ($status !== 'valid' && !$is_dismissed) {
            ?>
            <div class="notice notice-warning is-dismissible grassroots-activation-notice">
                <p>
                    <?php
                    echo wp_kses(
                        sprintf(
                            __('Activate your theme to get theme updates. <a href="%s">Theme License</a>', 'grassroots'),
                            esc_url(admin_url('themes.php?page=grassroots-license'))
                        ),
                        ['a' => ['href' => []]]
                    );
                    ?>
                </p>
            </div>
            <script type="text/javascript">
                (function($) {
                    $(document).on('click', '.grassroots-activation-notice .notice-dismiss', function() {
                        $.post(ajaxurl, {
                            action: 'dismiss_grassroots_activation_notice',
                            security: '<?php echo esc_js(wp_create_nonce('dismiss_grassroots_activation_notice')); ?>'
                        });
                    });
                })(jQuery);
            </script>
            <?php
        }
    }    

    public function dismiss_grassroots_activation_notice() {
        check_ajax_referer('dismiss_grassroots_activation_notice', 'security');
    
        $user_id = get_current_user_id();
        update_user_meta($user_id, 'grassroots_license_activation_notice_dismissed', true);
    
        wp_send_json_success();
    }

    public function remove_credentials() {
        check_ajax_referer('grassroots_nonce', 'security');

        // Check user permissions to ensure they can manage options
        if (!current_user_can('manage_options')) {
            wp_send_json_error(['message' => 'User does not have permission']);
            return;
        }
    
        delete_option('grassroots_username');
        delete_option('grassroots_password');
        delete_option('grassroots_license_status');
    
        wp_send_json_success();
    }
    
    public function grassroots_license_notice() {
        $status = get_option('grassroots_license_status', '');
        $user_id = get_current_user_id();
        $is_dismissed = get_user_meta($user_id, 'grassroots_license_notice_dismissed', true);
    
        $current_screen = get_current_screen();
        if ($current_screen->base !== 'appearance_page_grassroots-license') {
            return; 
        }

        update_user_meta($user_id, 'grassroots_license_notice_dismissed', false);

        // Only show the notice if the status is 'invalid' and the user hasn't dismissed it.
        if ( ( 'invalid' === $status || 'no_account' === $status ) && !$is_dismissed) {
            ?>
            <div class="notice notice-error is-dismissible grassroots-license-notice">
                <p>
                    <?php

                        $message = '';

                        if ( 'invalid' === $status ) {
                            $message = sprintf(
                                __('Your renewal period has expired, consider <a href="%s" target="_blank">renewing</a> to get the latest updates.', 'grassroots'),
                                esc_url('https://www.organizedthemes.com/account/member')
                            );
                        }

                        if ( 'no_account' === $status ) {
                            $message = sprintf(
                                __('Account not found in our system.', 'grassroots'),
                            );
                        }

                        echo wp_kses(
                            $message,
                            [
                                'a' => [
                                    'href' => [],
                                    'target' => []
                                ]
                            ]
                        );
                    ?>
                </p>
            </div>
            <script type="text/javascript">
                (function($) {
                    $(document).on('click', '.grassroots-license-notice .notice-dismiss', function() {
                        $.post(ajaxurl, {
                            action: 'dismiss_grassroots_license_notice',
                            security: '<?php echo esc_js(wp_create_nonce('dismiss_grassroots_license_notice')); ?>'
                        });
                    });
                })(jQuery);
            </script>
            <?php
        }
    }
    
    public function dismiss_grassroots_license_notice() {
        check_ajax_referer('dismiss_grassroots_license_notice', 'security');
    
        $user_id = get_current_user_id();
        update_user_meta($user_id, 'grassroots_license_notice_dismissed', true);
    
        wp_send_json_success();
    }    
    
    public function adding_grassroots_license_page() {
        add_theme_page(
            esc_html__( 'Theme License', 'grassroots' ),
            esc_html__( 'Theme License', 'grassroots' ),
            'manage_options',
            'grassroots-license',
            [ $this, 'grassroots_license_page' ],
        );
    }
    
    public function grassroots_register_option() {
        register_setting(
            'grassroots-license',
            'grassroots_username',
            [ $this, 'sanitize_username' ]
        );
    
        register_setting(
            'grassroots-license',
            'grassroots_password',
            [ $this, 'sanitize_license' ]
        );
    }

    public function sanitize_username( $value ) {
        $status = get_option( 'grassroots_license_status', '' );

        if ( 'no_account' === $status ) {
            return '';
        }

        return sanitize_text_field( $value );
    }


    public function sanitize_license( $value ) {
        $status = get_option( 'grassroots_license_status', '' );

        if ( 'no_account' === $status ) {
            return '';
        }

        $password = get_option( 'grassroots_password', '' );

        if ( $password === $value ) {
            return $value;
        }

        $value = sanitize_text_field( $value );

        return base64_encode( $value );
    }

    public function grassroots_license_page() {
        $username = get_option( 'grassroots_username', '' );
        $password = get_option( 'grassroots_password', '' );
    
        ?>
        <div class="wrap">
            <h2><?php echo esc_html__( 'Theme License', 'grassroots' ); ?></h2>
            <p>
                <?php
                echo wp_kses(
                    __('Please enter your account credentials to get access to one-click theme updates.<br><br>If you do not enter your credentials below, you will not have access to update notifications and one-click updates from within WordPress. You will instead have to manually check for updates on our website in order to manually install each update. After entering your credentials, in order to get notified of updates, the theme must be activated. Please use the same credentials that you use to log in to your account with us.', 'grassroots'),
                    ['br' => []]
                );
                ?>
            </p>
            <p style="margin-bottom: 30px;">
                <a href="<?php echo esc_url('https://www.organizedthemes.com/account/member'); ?>" target="_blank" class="button-primary">
                    <?php echo esc_html__( 'View Account', 'grassroots' ); ?>
                </a>
            </p>
            <form method="post" action="options.php">
    
                <?php settings_fields( 'grassroots-license' ); ?>
    
                <table class="form-table">
                    <style>
                        #grassroots_password {
                            text-security: disc;
                            -webkit-text-security: disc;
                            -moz-text-security: disc;
                        }
                    </style>
                    <tbody>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php echo esc_html__( 'Username', 'grassroots' ); ?>
                            </th>
                            <td>
                                <input id="grassroots_username" name="grassroots_username" type="text" class="regular-text" value="<?php echo esc_attr( $username ); ?>" required />
                            </td>
                        </tr>
                        <tr valign="top">
                            <th scope="row" valign="top">
                                <?php echo esc_html__( 'Password', 'grassroots' ); ?>
                            </th>
                            <td>
                                <input id="grassroots_password" name="grassroots_password" type="password" class="regular-text" value="<?php echo esc_attr( $password ); ?>" required />
                            </td>
                        </tr>
                        <?php if ( ! empty( $username ) && ! empty( $password ) ) : ?>
                            <tr valign="top">
                                <th scope="row" valign="top">
                                    <?php echo esc_html__('Action', 'grassroots'); ?>
                                </th>
                                <td>
                                    <?php wp_nonce_field( 'grassroots_nonce', 'grassroots_nonce' ); ?>
                                    <button type="button" class="button-secondary" id="grassroots_remove_credentials">
                                        <?php esc_attr_e( 'Remove Credentials', 'grassroots' ); ?>
                                    </button>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
                <?php submit_button( 'Save Credentials' ); ?>
            </form>
            <script type="text/javascript">
                (function($) {
                    $(document).on('click', '#grassroots_remove_credentials', function(e) {
                        console.log('Removing credentials...');
                        e.preventDefault();
                        var $button = $(this);
                        var nonce = $('#grassroots_nonce').val();

                        $button.attr('disabled', true).text('<?php echo esc_js( __('Removing...', 'grassroots') ); ?>');
                        $.post(ajaxurl, {
                            action: 'grassroots_remove_credentials',
                            security: nonce
                        }, function(response) {
                            if (response.success) {
                                console.log('<?php echo esc_js(__('Credentials removed successfully.', 'grassroots')); ?>');
                                location.reload();
                            } else {
                                console.log('<?php echo esc_js(__('An error occurred while removing the credentials.', 'grassroots')); ?>');
                            }

                            $button.attr('disabled', false).text('<?php echo esc_js( __( 'Remove Credentials', 'grassroots' ) ); ?>');
                        });
                    });
                })(jQuery);
            </script>
        </div>
        <?php
    }

    public function license_action() {
       if (
            ( ! empty( $_POST['option_page'] ) && 'grassroots-license' === $_POST['option_page'] ) &&
            ( ! empty( $_POST['action'] ) && 'update' === $_POST['action'] ) &&
            ( ! empty( $_POST['grassroots_username'] ) && ! empty( $_POST['grassroots_password'] ) )
       ) {
            $username = sanitize_text_field( $_POST['grassroots_username'] );
            $password = sanitize_text_field( $_POST['grassroots_password'] );

            $saved_password = get_option( 'grassroots_password', '' );

            if ( $saved_password !== $password ) {
                $password = base64_encode( $password );
            }

            update_option( 'grassroots_password', $password );

            /* API URL for theme updates */
            $remote_url = add_query_arg( [
                'theme-slug' => 'grassroots',
                'username' => $username,
                'password' => $password,
            ], 'https://www.organizedthemes.com/wp-json/theme-update/v1/updates' );

            $remote_request = array(
                'timeout'    => 20,
            );
    
            /* Make the remote call to check for updates */
            $raw_response = wp_remote_get( $remote_url, $remote_request );
    
            /* Check for errors in the response */
            if ( is_wp_error( $raw_response ) || 200 != wp_remote_retrieve_response_code( $raw_response ) ) {
                return;
            }
    
            /* Decode the response */
            $response = json_decode( wp_remote_retrieve_body( $raw_response ), true );
         
            if ( ! empty( $response['no_account'] ) ) {
                update_option( 'grassroots_license_status', 'no_account' );
                add_settings_error( 'grassroots-license', 'grassroots-license-no-account', __( 'Account not found in our system.', 'grassroots' ), 'error' );
                return;
            }

            $response = ! empty( $response[ 0 ] ) ? $response[ 0 ] : [];

            if ( ! empty( $response['disable_download'] ) ) {
                update_option( 'grassroots_license_status', 'no_download' );
                return;
            }

            if ( ! empty( $response ) ) {
                update_option( 'grassroots_license_status', 'valid' );
                return;
            }

            update_option( 'grassroots_license_status', 'invalid' );
       }
    }
}

new Grassroots_Theme_License();