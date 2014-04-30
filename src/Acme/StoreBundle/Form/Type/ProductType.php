<?php

namespace Acme¥StoreBundle¥Form¥Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Acme¥StoreBundle¥Form¥Type¥Category;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('price', 'money', array('currency' => 'USD'));
        $builder->add('category',new CategoryType());

    }

    public function getName()
    {
        return 'product';
    }
}