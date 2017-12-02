<?php

use \bjoernffm\SecretSanta\Bag;

/**
 * @codeCoverageIgnore
 */
class BagTest extends PHPUnit_Framework_TestCase
{
    public function testAddMember1()
    {
        $bag = new Bag();

        $this->assertEquals(
            $bag->getMembers(),
            []
        );
    }

    public function testAddMember2()
    {
        $bag = new Bag();
        $bag->addMember('Bjoern');
        $bag->addMember('Georgi');

        $this->assertEquals(
            $bag->getMembers(),
            [
                'Bjoern',
                'Georgi'
            ]
        );
    }

    public function testPopMember1()
    {
        $bag = new Bag();
        $bag->addMember('Bjoern');
        $bag->addMember('Georgi');

        $this->assertEquals(
            $bag->popMember(['Georgi']),
            'Bjoern'
        );
    }

    /**
     * @expectedException Exception
     */
    public function testPopMember2()
    {
        $bag = new Bag();
        $bag->addMember('Bjoern');
        $bag->addMember('Georgi');

        $bag->popMember(['Georgi', 'Bjoern']);
    }
}