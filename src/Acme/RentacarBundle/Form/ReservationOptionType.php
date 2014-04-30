<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/04/20
 * Time: 22:24
 */

namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;


class ReservationOptionType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm(FormBuilderInterface $builder , array $options)
    {
        $builder
            ->add('useInsurance','checkbox',array('required'=>false))
            ->add('note')
        ;
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
           return 'reservation_option';
    }

}
