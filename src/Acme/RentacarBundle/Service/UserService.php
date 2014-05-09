<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/05/09
 * Time: 15:56
 */

namespace Acme\RentacarBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Acme\RentacarBundle\Entity\User;

class UserService
{
    private $managerRegistry;
    private $mailService;

    public function __construct(RegistryInterface $managerRegistry , MailService $mailService)
    {
        $this->managerRegistry = $managerRegistry;
        $this->mailService = $mailService;
    }

    public function registerUser(User $user)
    {
        $userRepository = $this->managerRegistry->getRepository('AcmeRentacarBundle:User');
        try{
            $userRepository->createUser($user);
            $this->mailService->sendRegistrationConfirmMail($user);
        }catch(¥InvalidArgumentException $e){
            $this->mailService->sendDuplicatedRegistrationMail($user);
        }
    }
}