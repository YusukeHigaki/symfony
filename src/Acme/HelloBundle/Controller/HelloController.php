<?php
namespace Acme\HelloBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class HelloController extends Controller
{
	public function index($name){
		return $this->render(
			'AcmeHelloBundle:Hello:index.html.twig',
			array('name'=>$name)
		);
	}
}
