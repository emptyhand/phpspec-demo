<?php

namespace spec\Demo;

use Demo\Clothes;
use Demo\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class LaundrySpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Demo\Laundry');
    }

    function it_adds_clothes(Person $person, Clothes $clothes)
    {
        $this->addClothes($person, $clothes);
        $this->getClothes($person)->shouldBeArray();
    }

    function it_gets_clothes(Person $person, Clothes $clothes)
    {
        $this->addClothes($person, $clothes);
        $this->getClothes($person)->shouldBeArray();
    }
}
