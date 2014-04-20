<?php
namespace Acme\RentacarBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * ReservationLocationType
 * 
 * @author Yusuke Hikgai <yusukehigaki0302@gmail.com>
 */

class ReservationLocationType extends AbstractType
{
	/**
	 * @inheritDoc
	 */
	public function buildForm(FormBuilderInterface $builder,array $options)
	{
		$builder
			->add('departureAt')
			->add('departureLocation')
			->add('returnAt')
			->add('returnLocation')
		;
	}

	/**
	 * @inheritDoc
	 */
	public function getName()
	{
		return 'reservation_location';	
	}

	/**
	 * @inheritDoc
	 */
	public function getDefaultOptions(array $options)
	{
		array(
			'validation_groups' => array('reservation_location'),
		);
	}
}




?>
