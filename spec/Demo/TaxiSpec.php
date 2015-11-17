<?php

namespace spec\Demo;

use Demo\Person;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class TaxiSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Demo\Taxi');
    }

    function it_picks_up_person(Person $person)
    {
        $this->addPerson($person);
        $persons = $this->getPersons();
        $persons[0]->shouldBe($person);
    }

    function it_adds_money($val)
    {
        $this->addMoney($val);

        $money = $this->getMoney();
        $money[0]->shouldBe($val);
    }

    function it_counts_money()
    {
        $this->addMoney(5);
        $this->addMoney(2);
        $this->addMoney(1);

        $this->countMoney()->shouldReturn(8);
    }
}
