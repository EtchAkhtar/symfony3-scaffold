<?php
/**
 * Controller File
 *
 * Handles requests for demo pages
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\FormError;
use AppBundle\Form\DemoPersonForm;
use AppBundle\Entity\DemoPerson;


/**
 * Controller Class
 *
 * Handles requests for demo pages
 *
 * @author Etch Akhtar
 * @version 1.0
 * @since 23rd Jul 2016
 * @copyright Copyright (c) 2016, Etch Akhtar
 */
class DemoController extends Controller
{
	/**
	 * Controller Action
	 *
	 * Displays the index page
	 *
	 * @param Request $request the request object
	 * @return string the page HTML
	*/
   public function indexAction(Request $request)
	{
		// Required services for action
		$utility = $this->get('app.utility');
		$em = $this->getDoctrine()->getManager();
		$validator = $this->get('validator');

		// Get records from database
		$people = $em->getRepository('AppBundle:DemoPerson')->getPeopleOlderThan(18);

		// Get form and set defaults
		$demo = new DemoPerson();
		$demo->setAge(18);

        $form = $this->createForm(DemoPersonForm::class, $demo);
		$form->handleRequest($request);


		/*
		 * example of validating an object directly without form
			$errors = $validator->validate($demo);
			if (count($errors) > 0) {
				// Do something
		    }
	    */

		if ($form->isSubmitted()) {



			// Any custom validation
    		// $form->addError(new FormError('Custom error', []));

			if ($form->isValid()) {
				// Save to db
				$em->persist($demo);
				$em->flush();

				$msg = 'Record was saved successfully';
 	   		}
 	   		else {
 	   			// Generate errors and return
				$err = '';
				foreach ($form->getErrors(true) as $error) {
					$err .= $error->getMessage() . '<br />';
				}

				$utility->generateError($err);
 	   		}

			return $utility->generateResponse(['content' => 'json'],
				json_encode(
					[
						'msg' => $msg
					]
				)
			);
 	   	}
 	   	else {

 	   		// Output
			return $this->render('AppBundle:Demo:index.html.twig', [
				'form' => $form->createView(),
				'people' => $people
			]);
		}
	}

	/**
	 * Controller Action
	 *
	 * Displays the modal popup
	 *
	 * @param Request $request the request object
	 * @return string a json response
	*/
   public function modalAction(Request $request)
	{
		// Required services for action
		$utility = $this->get('app.utility');

		return $utility->generateResponse(['content' => 'json'],
			json_encode(
				[
					'msg' => $this->renderView('AppBundle:Demo:modal.html.twig', [
					])
				]
			)
		);

	}

	/**
	 * Controller Action
	 *
	 * Deletes the demo records fro mthe database
	 *
	 * @param Request $request the request object
	 * @return string a json response
	*/
   public function deleteAction(Request $request)
	{
		// Required services for action
		$utility = $this->get('app.utility');
		$em = $this->getDoctrine()->getManager();

		$people = $em->getRepository('AppBundle:DemoPerson')->findAll();

		foreach ($people as $person) { $em->remove($person); }
		$em->flush();

		return $utility->generateResponse(['content' => 'json'],
			json_encode(
				[
					'msg' => 'All records have been deleted successfully'
				]
			)
		);

	}
}
