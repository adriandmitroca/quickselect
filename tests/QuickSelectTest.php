<?php

namespace AdrianDmitroca\QuickSelect\Tests;

use AdrianDmitroca\QuickSelect\QuickSelect;
use PHPUnit_Framework_TestCase as PHPUnit;

class QuickSelectTest extends PHPUnit
{

    public function test_it_can_find_kth_smallest_number()
    {
        $subject = [100, 50, 30, 20, 10];
        shuffle($subject);

        $quickSelect = new QuickSelect($subject);

        $this->assertEquals(30, $quickSelect->select(2));
    }

    public function test_it_can_find_smallest_number()
    {
        $subject = [100, 50, 30, 20, 10];
        shuffle($subject);

        $quickSelect = new QuickSelect($subject);

        $this->assertEquals(10, $quickSelect->select(0));
    }
}
