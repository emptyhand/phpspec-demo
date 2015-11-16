<?php

namespace spec\Demo;

use Demo\Clothes;
use Demo\Laundry;
use Demo\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class OfficeEmployeeSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Demo\OfficeEmployee');
    }

    function it_makes_clothes_dirty(Clothes $clothes)
    {
        $this->addDirtyClothes($clothes);

        $dirty_clothes = $this->getDirtyClothes();
        $dirty_clothes[0]->shouldBe($clothes);
    }

    function it_counts_dirty_clothes(Clothes $clothes)
    {
        $this->addDirtyClothes($clothes);
        $this->countDirtyClothes()->shouldReturn(1);
    }

    function it_sends_dirty_clothes_to_laundry(Laundry $laundry)
    {
        $laundry->addClothes($this->getDirtyClothes());
    }

    function it_gets_clean_clothes_from_laundry(Laundry $laundry, Person $person)
    {
        $laundry->getClothes($person);
    }
}
