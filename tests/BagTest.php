<?php

use \bjoernffm\SecretSanta\Bag;
use \bjoernffm\SecretSanta\Member;

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
        $member1 = new Member();
        $member1->setName('Bjoern');
        $member2 = new Member();
        $member2->setName('Georgi');

        $bag = new Bag();
        $bag->addMember($member1);
        $bag->addMember($member2);

        $this->assertEquals(
            $bag->getMembers(),
            [
                $member1,
                $member2
            ]
        );
    }

    public function testPopMember1()
    {
        $member1 = new Member();
        $member1->setName('Bjoern');
        $member2 = new Member();
        $member2->setName('Georgi');

        $bag = new Bag();
        $bag->addMember($member1);
        $bag->addMember($member2);

        $this->assertEquals(
            $bag->popMember([$member2]),
            $member1
        );
    }

    public function testPopMember2()
    {
        $member1 = new Member();
        $member1->setName('Bjoern');
        $member2 = new Member();
        $member2->setName('Georgi');

        $bag = new Bag();
        $bag->addMember($member1);
        $bag->addMember($member2);

        $this->assertEquals(
            $bag->popMember([$member1, $member2]),
            null
        );
    }
}