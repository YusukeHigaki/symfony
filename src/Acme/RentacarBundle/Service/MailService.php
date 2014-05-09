<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/04/30
 * Time: 16:36
 */

namespace Acme\RentacarBundle\Service;

use Acme\RentacarBundle\Entity\Reservation;
use Acme\RentacarBundle\Entity\User;

/**
 * Mail Service.
 *
 * @author Yusuke Higaki <yusuke.higaki@dzb.jp>
 */
class MailService
{
    /**
     * @var \Twig_Environment
     */
    private $mailer;

    /**
     * @var \Twig_Environment
     */
    private $twig;

    /**
     * Constructor.
     *
     * @param \Swift_Mailer $mailer
     * @param \Twig_Environment $twig
     */
    public function __construct(\Swift_Mailer $mailer , \Twig_Environment $twig)
    {
        $this->mailer = $mailer;
        $this->twig = $twig;
    }

    /**
     * Send reservation mail
     *
     * @param Reservation $reservation
     * @param User user
     *
     */
    public function sendReservationMail(Reservation $reservation,User $user)
    {
        $body = $this->render('AcmeRentacarBundle:Mail:reservation.txt.twig',array(
            'reservation' => $reservation,
            'user' => $user,
        ));

        $message = \Swift_Message::newInstance()
            ->setSubject('予約を受け付けました')
            ->setFrom(array('noreply@example.com' => 'PHPレンタカー'))
            ->setTo($user->getEmail())
            ->setBody($body);

        $this->mailer->send($message);
    }

    /**
     * Render twig template
     *
     * @param string $template
     * @param array $variables
     * @return string
     */
    protected function render($template , array $variables = array())
    {
        return $this->twig->loadTemplate($template)->render($variables);
    }

    public function sendRegistrationConfirmMail(User $user)
    {
        $body = $this->render('AcmeRentacarBundle:Mail:registrationConfirm.txt.twig',array('user'=>$user));
        $message = \Swift_Message::newInstance()
            ->setSubject('仮登録が完了しました')
            ->setFrom(array('noreply@example.com'),'PHPレンタカー')
            ->setTo($user->getEmail())
            ->setBody($body)
        ;

        $this->mailer->send($message);
    }

    public function sendDuplicatedRegistrationMail(User $user)
    {
        $body = $this->render('AcmeRentacarBundle:Mail:duplicatedRegistration.txt.twig',array('user' => $user));
        $message = \Swift_Message::newInstance()
            ->setSubject('既に登録されたメールアドレスです')
            ->setFrom(array('noreply@example.com'),'PHPレンタカー')
            ->setTo($user->getEmail())
            ->setBody($body)
        ;

        $this->mailer->send($message);
    }
}
