<?php
namespace Acme\RentacarBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Crocos\SecurityBundle\Annotation\Secure;
use Crocos\SecurityBundle\Annotation\SecureConfig;

/**
 * AppController.
 *
 * @author Yusuke Higaki <yusuke.higaki@dzb.jp>
 *
 * @SecureConfig(forward="AcmeRentacarBundle:Security:login",auth="session.entity")
 */

abstract class AppController extends Controller
{
    public function getSecurity()
    {
        return $this->get('crocos_security.context');
    }

    public function getUser()
    {
        return $this->getSecurity()->getUser();
    }
}

?>
