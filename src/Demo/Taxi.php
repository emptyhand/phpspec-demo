<?php

namespace Demo;

class Taxi
{
    private $persons = array();

    private $money = array();

    /**
     * @param Person $person
     */
    public function addPerson(Person $person)
    {
        $this->persons[] = $person;
    }

    /**
     * @return array
     */
    public function getPersons()
    {
        return $this->persons;
    }

    /**
     * @return array
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param float $val
     */
    public function addMoney($val)
    {
        $this->money[] = $val;
    }

    /**
     * @return int
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
}
