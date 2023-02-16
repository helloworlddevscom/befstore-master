<?php

namespace Aventura\Edd\AddToCartPopup\Core;

/**
 * Assets controller class, for registering and enqueueing static assets.
 */
class AssetsController extends Plugin\Module {

	// Asset type constants
	const TYPE_SCRIPT = 'script';
	const TYPE_STYLE = 'style';

	// Asset hooks constants
	const HOOK_FRONTEND = 'wp_enqueue_scripts';
	const HOOK_ADMIN = 'admin_enqueue_scripts';
	const HOOK_LOGIN = 'login_enqueue_scripts';

	/**
	 * Constructor.
	 *
	 * @access protected
	 */
	protected function _construct() {}

	/**
	 * Execution method, run on 'edd_acp_on_run' action.
	 */
	public function run() {
		// Register hooks for loading assets
		$this->getPlugin()->getHookLoader()
				->queueAction(AssetsController::HOOK_FRONTEND, $this, 'frontendAssets')
				->queueAction(AssetsController::HOOK_ADMIN, $this, 'backendAssets');
	}

	/**
	 * Loads the assets used on the frontend.
	 * 
	 * @return Aventura\Edd\AddToCartPopup\Core\Plugin This instance
	 */
	public function frontendAssets() {
		// Code here
	}

	/**
	 * Loads the assets used in the backend.
	 * 
	 * @return Aventura\Edd\AddToCartPopup\Core\Plugin This instance
	 */
	public function backendAssets() {
		// Settings
		$this->registerScript('edd_acp_settings', EDD_ACP_JS_URL . 'settings.js');
		$this->registerStyle('edd_acp_settings', EDD_ACP_CSS_URL . 'settings.css');
        // Spectrum Colorpicker
        $this->registerScript('edd-acp-spectrum', EDD_ACP_JS_URL . 'spectrum.js');
		$this->registerStyle('edd-acp-spectrum', EDD_ACP_CSS_URL . 'spectrum.css');

        wp_localize_script('edd_acp_settings', 'EddAcpSettings', array(
            'options' => edd_acp()->getSettings()->getOptions(),
            'messages' => array(
                'confirmReset' => __('Are you sure you want to reset all options? This cannot be undone.', 'edd_acp')
            )
        ));

		if (filter_input(INPUT_GET, 'tab') === 'extensions') {
            $this->enqueueScript('edd-acp-spectrum');
			$this->enqueueStyle('edd-acp-spectrum');
			$this->enqueueScript('edd_acp_settings');
			$this->enqueueStyle('edd_acp_settings');
		}
	}

	/**
	 * Registers a script.
	 *
	 * @uses Assets::script()
	 * @see Assets::script()
	 */
	public function registerScript($handle, $src, $deps = array(), $ver = false, $in_footer = false) {
		return $this->script(false, $handle, $src, $deps, $ver, $in_footer);
	}

	/**
	 * Enqueues a script.
	 *
	 * @uses Assets::script()
	 * @see Assets::script()
	 */
	public function enqueueScript($handle, $src = null, $deps = array(), $ver = false, $in_footer = false) {
		return $this->script(true, $handle, $src, $deps, $ver, $in_footer);
	}

	/**
	 * All in one handler method for scripts.
	 *
	 * @param  boolean $enqueue   If true, the script is enqueued. If false, the script is only registered.
	 * @param  string  $handle    The script handle
	 * @param  string  $src       The path to the source file of the script
	 * @param  array   $deps      An array of script handles that this script depends upon. Default: array()
	 * @param  boolean $ver       The version of the script. Default: false
	 * @param  boolean $in_footer If true, the script is added to the footer of the page. If false, it is added to the document head. Default: false
	 * @return Aventura\Edd\AddToCartPopup\Core\AssetsController
	 */
	protected function script($enqueue, $handle, $src = null, $deps = array(), $ver = false, $in_footer = false) {
		return $this->handleAsset('script', $enqueue, $handle, $src, $deps, $ver, $in_footer);
	}

	/**
	 * Registers a style.
	 *
	 * @uses Assets::style()
	 * @see Assets::style()
	 */
	public function registerStyle($handle, $src, $deps = array(), $ver = false, $media = 'all') {
		return $this->style(false, $handle, $src, $deps, $ver, $media);
	}

	/**
	 * Enqueues a style.
	 *
	 * @uses Assets::style()
	 * @see Assets::style()
	 */
	public function enqueueStyle($handle, $src = null, $deps = array(), $ver = false, $media = 'all') {
		return $this->style(true, $handle, $src, $deps, $ver, $media);
	}

	/**
	 * All in one handler method for styles.
	 *
	 * @param  boolean $enqueue If true, the style is enqueued. If false, the style is only registered.
	 * @param  string  $handle  The style handle
	 * @param  string  $src     The path to the source file of the style
	 * @param  array   $deps    An array of style handles that this style depends upon. Default: array()
	 * @param  boolean $ver     The version of the style. Default: false
	 * @param  string  $media   The style's media scope. Default: all
	 * @return Aventura\Edd\AddToCartPopup\Core\AssetsController
	 */
	public function style($enqueue, $handle, $src, $deps = array(), $ver = false, $media = 'all') {
		return $this->handleAsset('style', $enqueue, $handle, $src, $deps, $ver, $media);
	}

	/**
	 * All in one method for setting up a hook and callback for an asset.
	 * 
	 * @param  string  $type    Asset::TYPE_SCRIPT or Asset::TYPE_STYLE
	 * @param  boolean $enqueue If true, the asset is enqueued. If false, the asset is only registered.
	 * @param  string  $handle  The asset's handle string
	 * @param  string  $src     Path to the asset's source file
	 * @param  array   $deps    Array of other similar asset handles that this asset depends on.
	 * @param  string  $ver     String version of the asset, for caching purposes.
	 * @param  mixed   $extra   Extra data to be included, such as style media or script location in document.
	 * @return Aventura\Edd\AddToCartPopup\Core\AssetsController
	 */
	protected function handleAsset($type, $enqueue, $handle, $src, $deps, $ver, $extra) {
		// Generate name of function to use (whether for enqueueing or registration)
		$fn = sprintf('wp_%1$s_%2$s', $enqueue === true? 'enqueue' : 'register', $type);
                if (!$ver) {
                    $ver = $this->getPlugin()->getInfo('Version');
                }
		// Call the enqueue/register function
		call_user_func_array($fn, array($handle, $src, $deps, $ver, $extra));

		return $this;
	}
}
