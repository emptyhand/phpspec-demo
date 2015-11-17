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

    function it_adds_clothes(Person $person)
    {
        $this->addClothes($person, array('Shirt', 'Trousers'));

        $person_clothes = $this->getPersonClothes($person);
        $person_clothes[1]->shouldBe('Trousers');
    }

    function it_gets_clothes(Person $person)
    {
        $this->addClothes($person, array('Shirt'));

        $person_clothes = $this->getPersonClothes($person);
        $person_clothes[0]->shouldBe('Shirt');
    }

    function it_counts_person_clothes(Person $person)
    {
        $this->addClothes($person, array('Hat', 'TShirt'));
        $this->countPersonClothes($person)->shouldReturn(2);
    }
}
