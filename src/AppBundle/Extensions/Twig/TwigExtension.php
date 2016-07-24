<?php
/**
 * Twig extension file
 *
 * Custom filter and function extensions for twig
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */

namespace AppBundle\Extensions\Twig;

/**
 * Twig Extension Class
 *
 * Handles requests for demo pages
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */
class TwigExtension extends \Twig_Extension
{
	/**
	 * Returns a list of extra filters
	 *
	 * @return array the filters
	 */
	public function getFilters()
	{
		return [
			new \Twig_SimpleFilter('testfilter', [$this, 'testfilter']),
		];
	}

	/**
	 * Returns a list of extra functions
	 *
	 * @return array the functions
	 */
	public function getFunctions()
	{
		return [
			new \Twig_SimpleFunction('testfunction', [$this, 'testfunction']),
		];
	}

	/**
	 * for a service we need a name
	 */
	public function getName()
	{
		return 'app_twig_extension';
	}


	/**
	 * Filter description
	 *
	 * @return text
	 */
    public function testfilter()
    {
    	return 'this is a test filter';
    }

	/**
	 * Function description
	 *
	 * @return text
	 */
    public function testfunction()
    {
    	return 'this is a test function';
    }

}
