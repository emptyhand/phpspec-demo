<?php

namespace Demo;

class Person
{
    /**
     * @var array
     */
    private $money = array();

    /**
     * @var array
     */
    private $dirtyClothes = array();

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
    public function addDirtyClothes(Clothes $clothes)
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
     * @param Laundry $laundry
     * @return int
     */
    public function sendDirtyClothesToLaundry(Laundry $laundry)
    {
        if($dirtyClothes = $this->getDirtyClothes()) {
            $laundry->addClothes($this, $dirtyClothes);
            return count($dirtyClothes);
        }
        return 0;
    }

    /**
     * @param Laundry $laundry
     * @return mixed
     */
    public function getCleanClothesFromLaundry(Laundry $laundry)
    {
        return $laundry->getPersonClothes($this);
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
