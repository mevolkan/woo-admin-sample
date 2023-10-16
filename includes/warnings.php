<?php

namespace Woo_Admin_Sample;
/**
 * Class to log warnings.
 */
class AdminWarnings {
	/**
	 * Message to be displayed in a warning.
	 *
	 * @var string
	 */
	private string $message;

	/**
	 * Initialize class.
	 *
	 * @param string $message Message to be displayed in a warning.
	 */
	public function __construct( string $message ) {
		$this->message = $message;

		add_action( 'admin_notices', array( $this, 'render' ) );
	}

	/**
	 * Displays warning on the admin screen.
	 *
	 * @return void
	 */
	public function render() {
		printf( '<div class="notice notice-warning is-dismissible"><p>Warning: %s</p></div>', esc_html( $this->message ) );
	}
}