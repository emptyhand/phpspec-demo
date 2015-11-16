<?php

namespace Demo;

abstract class Employee implements Person
{
    public $dirtyClothes = array();

    public function countDirtyClothes()
    {
        return count($this->dirtyClothes);
    }

    public function addDirtyClothes(Clothes $clothes)
    {
        $this->dirtyClothes[] = $clothes;
    }

    public function getDirtyClothes()
    {
        return $this->dirtyClothes;
    }
}
