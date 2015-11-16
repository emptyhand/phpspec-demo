<?php

namespace Demo;

class Laundry
{
    private $clothes = array();

    public function addClothes(Person $person, Clothes $clothes)
    {
        $this->clothes[$person->getId()][] = $clothes;
    }

    public function getClothes(Person $person)
    {
        return $this->clothes[$person->getId()];
    }
}
