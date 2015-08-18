<?php
/**
 * Defines a class we can use to prevent crashing (with a null pointer error)
 * when device detection is not readily available, such as when the idMyGadget
 * plugin is not installed or not active.
 */
if( !defined('DS') )
{
	define('DS', DIRECTORY_SEPARATOR);
}

class JmwsIdMyGadgetNoDetection
{
	/**
	 * Location of the plugin file.  We need to know if it's not installed and active.
	 */
	const IDMYGADGET_PLUGIN_FILE = 'jmws_idMyGadget_for_wordpress/jmws_idMyGadget_for_wordpress.php';
	/**
	 * Error message, set only when there's an error
	 * @var type String
	 */
	public $errorMessage = '';
	/**
	 * Error message for when the plugin is not installed
	 */
	const IDMYGADGET_NOT_INSTALLED = '<div><p class="idmygadget-error">This theme uses the jmws_idMyGadget_for_wordpress plugin.  Please install and activate the plugin, which is available on github, or use a different theme.</p></div>';
	/**
	 * Error message for when the plugin is not active
	 */
	const IDMYGADGET_NOT_ACTIVE = '<div><p class="idmygadget-error">This theme uses the jmws_idMyGadget_for_wordpress plugin.  Please activate the plugin in the Wordpress administration console, or use a different theme.</p></div>';
	/**
	 * Error message for when there is an unknown error (bug?)
	 */
	const IDMYGADGET_UNKNOWN_ERROR = '<div><p class="idmygadget-error">Missing jmwsIdMyGadget object; the jmws_idMyGadget_for_wordpress plugin must be broken.  Please fix the plugin or use a different theme.</p></div>';

	/**
	 * Valid values for the gadget string.  Use invalid values at your own risk!
	 */
	const GADGET_STRING_DETECTOR_NOT_INSTALLED = 'Detector Not Installed';
	const GADGET_STRING_UNKNOWN_DEVICE = 'Unknown Device';
	const GADGET_STRING_DESKTOP = 'Desktop';
	const GADGET_STRING_TABLET = 'Tablet';
	const GADGET_STRING_PHONE = 'Phone';

	public $supportedGadgetDetectors = array();
	public $supportedThemes = array();

	/**
	 * A string that represents the gadget being used
	 */
	protected $gadgetString = '';

	/**
	 * Constructor: nothing to see here
	 */
	public function __construct()
	{
		$this->setGadgetString();
	}
	/**
	 * The gadget string is read-only!
	 */
	public function getGadgetString()
	{
		return $this->gadgetString;   // set in constructor
	}
	public function getGadgetStringChar()
	{
		return '?';
	}

	/**
	 * For now, when there is no detection, assume we are on a desktop..
	 * @return string gadgetString
	 */
	protected function setGadgetString()
	{
		$this->gadgetString = self::GADGET_STRING_DESKTOP;
		return $this->gadgetString;
	}

	/**
	 * The gadgetDetectorString is not available, return a suitable substitute
	 */
	public function getGadgetDetectorString()
	{
		return self::GADGET_STRING_DETECTOR_NOT_INSTALLED;
	}
	public function getGadgetDetectorStringChar()
	{
		return '?';
	}
}
