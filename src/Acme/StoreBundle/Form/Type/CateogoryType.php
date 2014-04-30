<?php
namespace Acme¥StoreBundle¥Form¥Type;

use Symfony\Component\Form\Test\FormBuilderInterface;
use Symfony¥Component¥Form¥AbstractType;

class CategoryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $buider , array $options)
    {
        $builder->add('name');
    }

    public function getDefaultOptions(array $options)
    {
        return array(
          'data_class' => 'Acme¥StoreBundle¥Entity¥Category',
        );
    }

    public function getName()
    {
        return 'category';
    }
}