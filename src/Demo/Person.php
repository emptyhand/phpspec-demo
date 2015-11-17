<?php

namespace Demo;

class Person
{
    /**
     * @var Laundry
     */
    private $laundry;

    /**
     * @var array
     */
    private $money = array();

    /**
     * @var array
     */
    private $dirtyClothes = array();


    public function __construct($laundry)
    {
        $this->laundry = $laundry;
    }

    /**
     * @return Laundry
     */
    public function getLaundry()
    {
        return $this->laundry;
    }

    /**
     * @param Laundry $laundry
     */
    public function setLaundry($laundry)
    {
        $this->laundry = $laundry;
    }

    /**
     * @return int - number off dirty clothes
     */
    public function countDirtyClothes()
    {
        return count($this->dirtyClothes);
    }

    /**
     * @param Clothes $clothes
     */
    public function addDirtyClothes($clothes)
    {
        $this->dirtyClothes[] = $clothes;
    }

    /**
     * @return array
     */
    public function getDirtyClothes()
    {
        return $this->dirtyClothes;
    }

    /**
     * @return int - unique employee id
     */
    public function getId()
    {
        return 1;
    }

    /**
     * @return int
     */
    public function sendDirtyClothesToLaundry()
    {
        if($dirtyClothes = $this->getDirtyClothes()) {
            $this->getLaundry()->addClothes($this, $dirtyClothes);
            return count($dirtyClothes);
        }
        return 0;
    }

    /**
     * @return mixed
     */
    public function getCleanClothesFromLaundry()
    {
        return $this->getLaundry()->getPersonClothes($this);
    }

    /**
     * @return float
     */
    public function countMoney()
    {
        $amount = 0;
        if($this->money) {
            foreach ($this->money as $val) {
                $amount += $val;
            }
        }
        return $amount;
    }

    /**
     * @param float $val
     */
    public function addMoney($val)
    {
        $this->money[] = $val;
    }

    /**
     * @param Taxi $taxi
     * @param float $amount
     */
    public function payForTaxi(Taxi $taxi, $amount)
    {
        $taxi->addMoney($amount);
        $this->spendMoney($amount);
    }

    /**
     * @param float $val
     */
    public function spendMoney($val)
    {
        $this->money[] = ($val * -1);
    }
}
