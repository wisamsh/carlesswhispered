<?php
/**
 * Theme Info Page
 *
 * @package Digital Marketing Freelancer
 */

namespace Digital_Marketing_Freelancer;

use const DAY_IN_SECONDS;

/**
 * Exit if accessed directly.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

new Digital_Marketing_Freelancer_Theme_Notice();

class Digital_Marketing_Freelancer_Theme_Notice {

	/** @var \WP_Theme */
	private $digital_marketing_freelancer_theme;

	private $digital_marketing_freelancer_url = 'https://www.themescarts.com/';

	/**
	 * Class construct.
	 */
	public function __construct() {
		$this->digital_marketing_freelancer_theme = wp_get_theme();

		add_action( 'init', array( $this, 'handle_dismiss_notice' ) );

		if ( ! \get_transient( 'digital_marketing_freelancer_notice_dismissed' ) ) {
			add_action( 'admin_notices', array( $this, 'digital_marketing_freelancer_render_notice' ) );
		}

		add_action( 'switch_theme', array( $this, 'show_notice' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'digital_marketing_freelancer_enqueue_notice_assets' ) );
	}

	/**
	 * Delete notice on theme switch.
	 *
	 * @return void
	 */
	public function show_notice() {
		\delete_transient( 'digital_marketing_freelancer_notice_dismissed' );
	}

	/**
	 * Enqueue admin styles and scripts.
	 */
	public function digital_marketing_freelancer_enqueue_notice_assets() {
		wp_enqueue_style(
			'digital-marketing-freelancer-theme-notice-css',
			get_template_directory_uri() . '/inc/digital-marketing-freelancer-theme-info-page/css/theme-details.css',
			array(),
			'1.0.0'
		);

		wp_enqueue_script(
			'digital-marketing-freelancer-theme-notice-js',
			get_template_directory_uri() . '/inc/digital-marketing-freelancer-theme-info-page/js/theme-details.js',
			array( 'jquery' ),
			'1.0.0',
			true
		);

		// Pass dynamic URL to JS
		wp_localize_script( 'digital-marketing-freelancer-theme-notice-js', 'DigitalMarketingFreelancerTheme', array(
			'admin_url' => esc_url( admin_url( 'admin.php?page=themescarts' ) ),
		));
	}

	/**
	 * Render the admin notice.
	 */
	public function digital_marketing_freelancer_render_notice() {
		?>
		<div id="digital-marketing-freelancer-theme-notice" class="notice notice-info is-dismissible">
			<div class="digital-marketing-freelancer-content-wrap">
				<div class="digital-marketing-freelancer-notice-left">
					<?php
					$this->digital_marketing_freelancer_render_title();
					$this->digital_marketing_freelancer_render_content();
					$this->digital_marketing_freelancer_render_actions();
					?>
				</div>
				<div class="digital-marketing-freelancer-notice-right">
					<img src="<?php echo esc_url( get_template_directory_uri() . '/screenshot.png' ); ?>" alt="<?php esc_attr_e( 'Theme Notice Image', 'digital-marketing-freelancer' ); ?>">
				</div>
			</div>
		</div>
		<?php
	}

	/**
	 * Render title.
	 */
	protected function digital_marketing_freelancer_render_title() {
		?>
		<h2>
			<?php
			printf(
				// translators: %s is the theme name
				esc_html__( 'Thank you for installing %s!', 'digital-marketing-freelancer' ),
				'<span>' . esc_html( $this->digital_marketing_freelancer_theme->get( 'Name' ) ) . '</span>'
			);
			?>
		</h2>
		<?php
	}

	/**
	 * Render content.
	 */
	protected function digital_marketing_freelancer_render_content() {
		$digital_marketing_freelancer_link = '<a href="' . esc_url( $this->digital_marketing_freelancer_url ) . '" target="_blank">' . esc_html__( 'ThemesCarts', 'digital-marketing-freelancer' ) . '</a>';

		$digital_marketing_freelancer_text = sprintf(
			/* translators: %1$s: Author Name, %2$s: Link */
			esc_html__( 'Unlock the full potential of your new store with %1$s! Get started today by visiting %2$s to explore a wide range of ready-to-use patterns and demo templates, designed to enhance your online shopping experience.', 'digital-marketing-freelancer' ),
			esc_html__( 'ThemesCarts', 'digital-marketing-freelancer' ),
			$digital_marketing_freelancer_link
		);

		echo wp_kses_post( wpautop( $digital_marketing_freelancer_text ) );
	}

	/**
	 * Render action buttons.
	 */
	protected function digital_marketing_freelancer_render_actions() {
		$digital_marketing_freelancer_more_info_url = admin_url( 'themes.php?page=digital-marketing-freelancer-theme-info-page' );
		?>
		<div class="notice-actions">
			<a href="<?php echo esc_url( $digital_marketing_freelancer_more_info_url ); ?>" id="btn-install-activate">
				<?php esc_html_e( 'Click Here For Theme Info', 'digital-marketing-freelancer' ); ?>
			</a>
			<form class="digital-marketing-freelancer-notice-dismiss-form" method="post">
				<button type="submit" name="notice-dismiss" value="true" id="btn-dismiss">
					<?php esc_html_e( 'Dismiss', 'digital-marketing-freelancer' ); ?>
				</button>
			</form>
		</div>
		<?php
	}

	/**
	 * Handle dismiss action.
	 */
	public function handle_dismiss_notice() {
		if ( isset( $_POST['notice-dismiss'] ) ) {
			set_transient( 'digital_marketing_freelancer_notice_dismissed', true, DAY_IN_SECONDS * 3 );
			wp_safe_redirect( esc_url_raw( $_SERVER['REQUEST_URI'] ) );
			exit;
		}
	}
}
?>