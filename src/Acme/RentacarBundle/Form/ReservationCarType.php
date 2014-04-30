<?php
namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ReservationCarType.
 *
 * Author Yusuke Higaki <yusukehigaki0302@gmail.com>
 */

class ReservationCarType extends AbstractType
{
	/**
	 * @inheritDoc
	 */
	public function buildForm(FormBuilderInterface $builder,array $options)
	{
		$builder->add('carClass')
        ;
	}

	/**
	 * @inheritDoc
	 */
	public function getName()
	{
		return 'reservation_car';
	}

	/**
	 * @inheritDoc
	 */
	public function getDefaultOptions(array $options)
	{
		return array(
			'validation_group' => array('reservation_car')
		);
	}
	
}

