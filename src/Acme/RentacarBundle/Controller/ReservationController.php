<?php

namespace Acme\RentacarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Acme\RentacarBundle\Entity\Reservation;
use Acme\RentacarBundle\Form\ReservationLocationType;

/**
 * ReservationController.
 *
 * @author Yusuke Higaki <yusukehigaki0302@gmail.com>
 *
 * @Route("/reservation")
 */

Class ReservationController extends AppController
{
/**
 * @Route("/",name="reservation")
 * @Template
 */
	public function indexAction(Request $request)
	{
		return array();
	}

/**
 * @Route("/new",name="reservation_new")
 * @Template
 */
	public function newAction(Request $request)
	{
		$reservation = new Reservation();
		$form = $this->createForm(new ReservationLocationType(),$reservation);
		if('POST' === $request->getMethod()){
			$data = $request->request->get($form->getName());
			$form->bind($data);
			if($form->isValid){
				$request->getSession()->set('reservation_location',$data);
				return $this->redirect($this->generateUrl('reservation_car'));
			}
		}elseif($request->getSession()->has('reservation/location')){
			$data['_token'] = $form['_token']->getData();
			$form->bind($data);
		}

		return array(
			'form' => $form->createView(),
		);
}


/**
 * @Route("/car",name="reservation_car")
 * @Template
 */
	public function carAction(Request $request)
	{
		if('POST' === $request->getMethod()){
			return $this->redirect($this->generateUrl('reservation_option'));
		}
		return array();
	}

/**
 * @Route("/option",name="reservation_option")
 * @Template
 */
	public function optionAction(Request $request)
	{
		if('POST' === $request->getMethod()){
			return $this->redirect($this->generateUrl('reservation_confirm'));
		}
		return array();
	}

/**
 * @Route("/confirm",name="reservation_confirm")
 * @Template
 */
	public function confirmAction(Request $request)
	{
		return array();
	}

/**
 * @Route("/finish",name="reservation_finish")
 * @Template
 */
	public function finishAction(Request $request)
	{
		return array();
	}



}

?>
