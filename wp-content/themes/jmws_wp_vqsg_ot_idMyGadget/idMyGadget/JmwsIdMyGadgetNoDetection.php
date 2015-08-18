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
	public $errorMessage = '<div><p class="idmygadget-error">This theme uses the jmws_idMyGadget_for_wordpress plugin.  Please install and activate the plugin, which is available on github, or use a different theme.</p></div>';

	/**
	 * Valid values for the gadget string.  Use invalid values at your own risk!
	 */
	const GADGET_STRING_DETECTOR_NOT_INSTALLED = 'Detector Not Installed';
	const GADGET_STRING_UNKNOWN_DEVICE = 'Unknown Device';
	const GADGET_STRING_DESKTOP = 'Desktop';
	const GADGET_STRING_TABLET = 'Tablet';
	const GADGET_STRING_PHONE = 'Phone';

	const IDMYGADGET_PLUGIN_FILE = 'jmws_idMyGadget_for_wordpress/jmws_idMyGadget_for_wordpress.php';

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
