<?php
/**
 * Created by PhpStorm.
 * User: higakiyuusuke
 * Date: 2014/05/09
 * Time: 13:20
 */

namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvents;

class UserRegistrationType extends AbstractType
{
    /**
     * @inheritDoc
     */
    public function buildForm (FormBuilderInterface $builder , array $options)
    {
       $builder
           ->add('name')
           ->add('email','repeated',array(
               'type' => 'email',
               'invalid_message' => '同じ値を入力してください',
           ))
           ->add('rawPassword','password',array(
               'always_empty' => false
           ))
           ->add('tel')
           ->add('birthday','birthday')
           ->add('agreement','checkbox',array(
               'mapped' => false,
               'required' => true,
           ));

        $builder
            ->addEventListener(FormEvents::POST_BIND,function($event){
                $form = $event->getForm();
                if(!$form->has('agreement')){
                    $form->addError(new FormError('利用規約に同意してください'));
                }
            });
    }

    /**
     * @inheritDoc
     */
    public function getName()
    {
       return 'user_registration';
    }
}