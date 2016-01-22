<?php
/**
 * Functions added to the Our Theme ("ot") theme found in the book, WordPress, a Visual Quick Start Guide ("vqsg")
 * This code has been added specifically to support device detction
 *
 * @author Tom W. Hartung, using the Visual Quick Start Guide's "our-theme" as a starting point
 * @package Jmws
 * @since 1.0
 */
class JmwsIdMyGadgetVqsgOt
{

	/**
	 * Note that you do not need to instantiate this class unless you need to call a non-static method.
	 */
	public function __construct()
	{
	}

	/**
	 * Use the $logoTitleDescription to generate the html for the header
	 */
	public static function getHeaderHtml()
	{
		global $jmwsIdMyGadget;
		$logoTitleDescription = '';
	
		if ( $jmwsIdMyGadget->isInstalled() )
		{
			$logoTitleDescription = $jmwsIdMyGadget->getLogoTitleDescriptionHtml();
		}
		else
		{
			$logoTitleDescription = self::getLogoTitleDescriptionHtml();
		}
	
		$headerHtml  = '';
		$headerHtml  .= '<header id="header" ' . $jmwsIdMyGadget->jqmDataRole['header'] . ' ';
		$headerHtml  .= $jmwsIdMyGadget->jqmDataThemeAttribute . '>';
		$headerHtml  .= $logoTitleDescription;
		$headerHtml  .= '</header> <!-- #header -->';
		return $headerHtml;
	}
	/**
	 * If the idMyGadget module is not available we will use this,
	 * which is the original code downloaded in Sept. 2015
	 */
	protected static function getLogoTitleDescriptionHtml()
	{
		$logoTitleDescription = '<h1>' .
				'<a href="' . esc_url( home_url('/') ) . '" ' .
				'title="' . esc_attr( get_bloginfo('name','display') ) . '" ' .
				'rel="home">' . $site_name . '</a></h1>';
		$logoTitleDescription .= '<h4>' . get_bloginfo('description') . '</h4>';
		return $logoTitleDescription;
	}
}
