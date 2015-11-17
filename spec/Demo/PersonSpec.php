<?php

namespace spec\Demo;

use Demo\Clothes;
use Demo\Laundry;
use Demo\Person;
use Demo\Taxi;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class PersonSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('Demo\Person');
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

    function it_sends_dirty_clothes_to_laundry(Laundry $laundry, Clothes $clothes)
    {
        $this->addDirtyClothes($clothes);

        $this->sendDirtyClothesToLaundry($laundry)->shouldReturn(1);
    }

    function it_gets_clean_clothes_from_laundry(Clothes $clothes, Laundry $laundry)
    {
        $this->addDirtyClothes($clothes);
        $this->addDirtyClothes($clothes);

        $this->sendDirtyClothesToLaundry($laundry)->shouldReturn(2);

        $clothes = $this->getCleanClothesFromLaundry($laundry);
        //$clothes[0]->shouldBe(null);
    }

    function it_counts_money()
    {
        $this->addMoney(5);
        $this->addMoney(2);
        $this->addMoney(1);

        $this->countMoney()->shouldReturn(8);
    }

    function it_receives_money()
    {
        $this->addMoney(5);
        $this->countMoney()->shouldReturn(5);
    }

    function it_spends_money()
    {
        $this->addMoney(5);
        $this->addMoney(2);
        $this->countMoney()->shouldReturn(7);

        $this->spendMoney(4);
        $this->countMoney()->shouldReturn(3);
    }

    function it_pays_money_for_taxi(Taxi $taxi)
    {
        $this->payForTaxi($taxi, 7);
        $this->countMoney()->shouldReturn(-7);
    }
}
