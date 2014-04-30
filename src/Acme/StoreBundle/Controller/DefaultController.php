<?php

namespace Acme\StoreBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Acme\StoreBundle\Entity\Product;
use Symfony\Component\HttpFoundation\Request;
use Acme¥StoreBundle¥Form¥Type¥ProductType;

class DefaultController extends Controller
{
    /**
     * @Route("/product",name="store_product")
     * @Template()
     */
    public function indexAction(Request $request)
    {
        $product = new Product();
        $product->name = 'TestProduct';
        $product->setPrice('50.00');

        $form = $this->createForm(new ProductType,$product);


        if($request->getMethod() ==='POST'){
            $form->bind($request);
            if($form->isValid()){
                $em = $this->get('doctrine')->getEntityManager();
                $em->persist($product);
                $em->flush();

                return $this->generateUrl('store_product_success');
            }
        }

        return array('form' => $form->createView());
    }
}
