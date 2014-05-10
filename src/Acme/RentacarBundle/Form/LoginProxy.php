<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/05/10
 * Time: 11:54
 */

namespace Acme\RentacarBundle\Form;

use Acme\RentacarBundle\Entity\UserRepository;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginProxy
{
    public $email;
    public $password;
    private $userRepository;
    private $user;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function authenticate(ExecutionContext $context)
    {
        if(strlen($this->email)>0 && strlen($this->password)>0){
            $user = $this->userRepository->authenticateUser($this->email,$this->password);
            if($user){
                $this->user = $user;
            }else{
                $context->addViolation('メールアドレスとパスワードを入力してください',array(),$this);
            }
        }
    }

    public function getUser()
    {
        return $this->user;
    }



}