<?php

/**
 * This source file is subject to the GNU GENERAL PUBLIC LICENSE (GPL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://www.gnu.org/licenses/gpl-3.0.txt
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
} // Exit if accessed directly

if( !class_exists( 'suevafree_admin_notice' ) ) {

	class suevafree_admin_notice {
	
		/**
		 * Constructor
		 */
		 
		public function __construct( $fields = array() ) {

			if ( 
				!get_option( 'suevafree-has-dismissed-notice') &&
				version_compare( PHP_VERSION, SUEVAFREE_MIN_PHP_VERSION, '>=' )
			) {

				add_action( 'admin_notices', array(&$this, 'admin_notice') );
				add_action( 'admin_head', array( $this, 'dismiss' ) );
				add_action( 'admin_init', array(&$this, 'add_script') ,11);

            }

		}
        
		 /**
		 * Loads the notice style
		 */

		public function add_script() {

			global $wp_version;

			$file_dir = get_template_directory_uri() . '/core/admin/assets/';
			wp_enqueue_style ( 'suevafree-notice', $file_dir.'css/notice.css' );

		}
        
		/**
		 * Dismiss notice.
		 */
		
		public function dismiss() {

			if ( isset( $_GET['suevafree-dismiss'] ) && check_admin_referer( 'suevafree-dismiss-action' ) ) {

				update_option( 'suevafree-has-dismissed-notice', intval($_GET['suevafree-dismiss']) );
				remove_action( 'admin_notices', array(&$this, 'admin_notice') );
				
			} 
		
		}

		/**
		 * Admin notice.
		 */
		 
		public function admin_notice() {
			
		?>
			
            <div class="notice notice-warning is-dismissible">

				<p>
            		<strong>

                        <?php esc_html_e( 'Unlock all premium features of Sueva theme like...', 'suevafree' );  ?>
                    
                    </strong>
                </p>

                <p class="notice-coupon-message">

					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '600+ Google Fonts', 'suevafree' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Custom colors', 'suevafree' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '6 additional header layouts', 'suevafree' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( '6 additional blog layouts', 'suevafree' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Unlimited sidebars', 'suevafree' ); ?><br/>
					<span class="dashicon dashicons dashicons-yes-alt" size="10"></span><?php esc_html_e( 'Portfolio section', 'suevafree' ); ?><br/>
                
                </p>

            	<p>
					<strong>
						<?php esc_html_e( 'Get the premium version of Sueva - ', 'suevafree' ); ?>
						<?php esc_html_e( 'Starting at only ', 'suevafree' ); ?>
						<strike><?php esc_html_e( '€29', 'suevafree' ); ?></strike>
						<?php esc_html_e( '€25/year', 'suevafree' ); ?>
					</strong><br/>
					<strong><?php esc_html_e( 'Or choose the Plus plan to use Sueva as a starter theme to build your website.', 'suevafree' ); ?></strong>
                </p>

            	<p>

					<a href="<?php echo esc_url(admin_url( 'themes.php?page=suevafree-welcome-page&section=free_pro' )); ?>" class="button"><?php esc_html_e( 'Free vs Pro', 'suevafree' ); ?></a>
            		<a target="_blank" href="<?php echo esc_url( 'https://www.themeinprogress.com/sueva/?ref=2&campaign=sueva-notice' ); ?>" class="button button-primary"><?php esc_html_e( 'Upgrade now', 'suevafree' ); ?></a>
                
            	</p>

            	<p>

                    <?php

                        printf( 
                            '<a href="%1$s" class="dismiss-notice">' . esc_html__( 'Dismiss this notice', 'suevafree' ) . '</a>', 
                            esc_url( wp_nonce_url( add_query_arg( 'suevafree-dismiss', '1' ), 'suevafree-dismiss-action'))
                        );

                    ?>

            	</p>
                    

            </div>
		
		<?php
		
		}

	}

}

new suevafree_admin_notice();

?>