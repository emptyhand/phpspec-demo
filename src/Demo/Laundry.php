<?php

namespace Demo;

class Laundry
{
    /**
     * @var array
     */
    private $clothes = array();

    /**
     * @param Person $person
     * @param array $clothes
     */
    public function addClothes(Person $person, array $clothes)
    {
        $this->clothes[$person->getId()] = $clothes;
    }

    /**
     * @return array
     */
    public function getClothes()
    {
        return $this->clothes;
    }

    /**
     * @param Person $person
     * @return array
     */
    public function getPersonClothes(Person $person)
    {
        return $this->clothes[$person->getId()];
    }

    /**
     * @param Person $person
     * @return int
     */
    public function countPersonClothes(Person $person)
    {
        return count($this->clothes[$person->getId()]);
    }
}
