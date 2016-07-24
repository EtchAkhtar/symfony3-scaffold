<?php
/**
 * Global Functions
 *
 * Created as a service so it's available for all controllers
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */

namespace AppBundle\Providers;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Cookie;
use Symfony\Component\HttpFoundation\Response;

/**
 * Global Functions Class
 *
 * Created as a service so it's available for all controllers
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */
class Utility
{
	protected $kernel;
	protected $router;
	protected $session;

	/**
	 * Constructor
	 *
	 * Sets local properties for dependency-injected services needed for all functions
	 *
	 * @param object $kernel used to grab the container for accessing global parameters
	 * @param object $router generates urls
	 * @param object $session session manager
	 */
	public function __construct($kernel, $router, $session)
	{
		$this->kernel = $kernel;
		$this->router = $router;
		$this->session = $session;
	}

	/**
	 * Test function
	 *
	 * @param string $name the name to greet
	 * @return string a welcome message
	 */
	public function sayHello($name = '')
	{
		return 'Hello ' . $name;
	}

	/**
	 * Return an appropriate response header and HTTP code
	 *
	 * @param array $options set any required behaviour, such as HTTP code
	 * @param string $content the content to return
	 * @return the response object
	 */
	public function generateResponse($options = array(), $content = '')
	{
		$htmlCode = (array_key_exists('code', $options))? $options['code'] : 200;

		switch ($options['content'])
		{
			case 'json':
				$contentType = 'application/json';
				break;
			default:
				$contentType = 'text/html';
				break;
		}

		return new Response(
			$content,
			$htmlCode,
			['Content-Type' => $contentType]
		);
	}

	/**
	 * Return an error response header
	 *
	 * @param string $msg the error message to return
	 * @return the response object
	 */
	public function generateError($msg)
	{
		if ($msg == '') { $msg = 'Something went wrong'; }

		$response = $this->generateResponse(['content' => 'html', 'code' => 403],
			$msg
		);

		$response->send();
		exit;
	}

}
