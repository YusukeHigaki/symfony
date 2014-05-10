<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/05/09
 * Time: 12:52
 */

namespace Acme\RentacarBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Acme\RentacarBundle\Entity\User;
use Acme\RentacarBundle\Form\UserRegistrationType;

/**
 * @Route("/user")
 */
class UserController extends AppController
{
    /**
     * @Route("/register",name="user_register")
     * @Template
     */

    public function registerAction(Request $request)
    {
        $user = new User();
        $form = $this->createForm(new UserRegistrationType() , $user);

        if('POST' === $request->getMethod()){
            $form->bind($request);
            if($form->isValid()){
                $userService = $this->get('rentacar.user_service');
                $userService->registerUser($user);
                return $this->redirect($this->generateUrl('user_confirm'));
            }
        }

        return array(
            'form' => $form->createView(),
        );
    }

    /**
     * @Route("/confirm",name="user_confirm")
     * @Template
     */

    public function confirmAction()
    {
        return array();
    }

    /**
     * @Route("/activate",name="user_activate")
     * @Template
     */
    public function ActivateAction(Request $request)
    {
        $activationKey = $request->query->get('key');

        if(null !== $activationKey){
            $userRepository = $this->get('doctrine')->getRepository('AcmeRentacarBundle:User');
            if(null !== $userRepository->activateUser($activationKey)){
                $message = 'ユーザー登録完了しました。ログイン後、予約が行えるようになります。';
                $request->getSession()->setFlash('success',$message);
            }
        }
        return $this->redirect($this->generateUrl('login'));
    }

}
