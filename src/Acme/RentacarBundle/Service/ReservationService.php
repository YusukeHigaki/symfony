<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/04/30
 * Time: 16:16
 */

namespace Acme\RentacarBundle\Service;

use Symfony\Bridge\Doctrine\RegistryInterface;
use Acme\RentacarBundle\Entity\User;
use Acme\RentacarBundle\Entity\Reservation;
/**
 *  ReservationService
 *
 * @author Yusuke Higaki <yusuke.higaki@dzb.jp>
 */

class ReservationService
{
    /**
     * @var RegistryInterface
     */
    private $managerRegistry;

    /**
     * @var MailService
     */
    private $mailService;

    /**
     *  Constructor.
     *
     * @param RegistryInterface $managerRegistry
     * @param MailService @mailService
     */

   public function __construct(RegistryInterface $managerRegistry , MailService $mailService)
   {
       $this->managerRegistry = $managerRegistry;
       $this->mailService = $mailService;
   }

    /**
     * Save Reservatioin.
     *
     * @param Reservation $reservation
     * @param User $user
     */
    public function saveReservation(Reservation $reservation , User $user)
    {
        $manager = $this->managerRegistry->getEntityManager();
        $reservation->setUser($user);
        $date = date_create(date("Y-m-d H:i:s"));
        $reservation->setCreatedAt($date);
        $reservation->setUpdatedAt($date);

        $manager->persist($reservation);
        $manager->flush();

        $this->mailService->sendReservationMail($reservation,$user);
    }


}
