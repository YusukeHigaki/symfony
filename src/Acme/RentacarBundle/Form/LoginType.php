<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/05/10
 * Time: 11:41
 */

namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

class LoginType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder , array $options)
    {
        $builder
            ->add('email','email')
            ->add('password','password')
            ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
        return 'login';
    }
}