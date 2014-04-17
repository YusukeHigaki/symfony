<?php

namespace Acme\RentacarBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reservation
 *
 * @ORM\Table(name="reservation")
 * @ORM\Entity
 */
class Reservation
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=false)
     */
    private $userId;

    /**
     * @var integer
     *
     * @ORM\Column(name="car_class_id", type="integer", nullable=false)
     */
    private $carClassId;

    /**
     * @var integer
     *
     * @ORM\Column(name="departure_location_id", type="integer", nullable=false)
     */
    private $departureLocationId;

    /**
     * @var integer
     *
     * @ORM\Column(name="return_location_id", type="integer", nullable=false)
     */
    private $returnLocationId;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="departure_at", type="datetime", nullable=false)
     */
    private $departureAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="return_at", type="datetime", nullable=false)
     */
    private $returnAt;

    /**
     * @var boolean
     *
     * @ORM\Column(name="use_insurance", type="boolean", nullable=false)
     */
    private $useInsurance;

    /**
     * @var string
     *
     * @ORM\Column(name="car_subtotal", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $carSubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="option_subtotal", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $optionSubtotal;

    /**
     * @var string
     *
     * @ORM\Column(name="total_amount", type="decimal", precision=10, scale=0, nullable=false)
     */
    private $totalAmount;

    /**
     * @var string
     *
     * @ORM\Column(name="note", type="text", nullable=false)
     */
    private $note;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime", nullable=false)
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime", nullable=false)
     */
    private $updatedAt;



    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set userId
     *
     * @param integer $userId
     * @return Reservation
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get userId
     *
     * @return integer 
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set carClassId
     *
     * @param integer $carClassId
     * @return Reservation
     */
    public function setCarClassId($carClassId)
    {
        $this->carClassId = $carClassId;

        return $this;
    }

    /**
     * Get carClassId
     *
     * @return integer 
     */
    public function getCarClassId()
    {
        return $this->carClassId;
    }

    /**
     * Set departureLocationId
     *
     * @param integer $departureLocationId
     * @return Reservation
     */
    public function setDepartureLocationId($departureLocationId)
    {
        $this->departureLocationId = $departureLocationId;

        return $this;
    }

    /**
     * Get departureLocationId
     *
     * @return integer 
     */
    public function getDepartureLocationId()
    {
        return $this->departureLocationId;
    }

    /**
     * Set returnLocationId
     *
     * @param integer $returnLocationId
     * @return Reservation
     */
    public function setReturnLocationId($returnLocationId)
    {
        $this->returnLocationId = $returnLocationId;

        return $this;
    }

    /**
     * Get returnLocationId
     *
     * @return integer 
     */
    public function getReturnLocationId()
    {
        return $this->returnLocationId;
    }

    /**
     * Set departureAt
     *
     * @param \DateTime $departureAt
     * @return Reservation
     */
    public function setDepartureAt($departureAt)
    {
        $this->departureAt = $departureAt;

        return $this;
    }

    /**
     * Get departureAt
     *
     * @return \DateTime 
     */
    public function getDepartureAt()
    {
        return $this->departureAt;
    }

    /**
     * Set returnAt
     *
     * @param \DateTime $returnAt
     * @return Reservation
     */
    public function setReturnAt($returnAt)
    {
        $this->returnAt = $returnAt;

        return $this;
    }

    /**
     * Get returnAt
     *
     * @return \DateTime 
     */
    public function getReturnAt()
    {
        return $this->returnAt;
    }

    /**
     * Set useInsurance
     *
     * @param boolean $useInsurance
     * @return Reservation
     */
    public function setUseInsurance($useInsurance)
    {
        $this->useInsurance = $useInsurance;

        return $this;
    }

    /**
     * Get useInsurance
     *
     * @return boolean 
     */
    public function getUseInsurance()
    {
        return $this->useInsurance;
    }

    /**
     * Set carSubtotal
     *
     * @param string $carSubtotal
     * @return Reservation
     */
    public function setCarSubtotal($carSubtotal)
    {
        $this->carSubtotal = $carSubtotal;

        return $this;
    }

    /**
     * Get carSubtotal
     *
     * @return string 
     */
    public function getCarSubtotal()
    {
        return $this->carSubtotal;
    }

    /**
     * Set optionSubtotal
     *
     * @param string $optionSubtotal
     * @return Reservation
     */
    public function setOptionSubtotal($optionSubtotal)
    {
        $this->optionSubtotal = $optionSubtotal;

        return $this;
    }

    /**
     * Get optionSubtotal
     *
     * @return string 
     */
    public function getOptionSubtotal()
    {
        return $this->optionSubtotal;
    }

    /**
     * Set totalAmount
     *
     * @param string $totalAmount
     * @return Reservation
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;

        return $this;
    }

    /**
     * Get totalAmount
     *
     * @return string 
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Set note
     *
     * @param string $note
     * @return Reservation
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get note
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Reservation
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Reservation
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}
