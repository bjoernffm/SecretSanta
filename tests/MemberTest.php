<?php

use \bjoernffm\SecretSanta\Member;

/**
 * @codeCoverageIgnore
 */
class MemberTest extends PHPUnit_Framework_TestCase
{
    public function testContruct()
    {
        $member = new Member();

        $this->assertEquals(
            $member->getName(),
            ''
        );
    }

    public function testSetName()
    {
        $member = new Member();
        $member->setName('Bjoern');

        $this->assertEquals(
            $member->getName(),
            'Bjoern'
        );
    }

    public function testSetNameWeakInputs()
    {
        $member = new Member();

        $member->setName(false);
        $this->assertEquals(
            $member->getName(),
            ''
        );

        $member->setName(true);
        $this->assertEquals(
            $member->getName(),
            '1'
        );

        $member->setName(-1);
        $this->assertEquals(
            $member->getName(),
            '-1'
        );

        $member->setName(1.123);
        $this->assertEquals(
            $member->getName(),
            '1.123'
        );

        $member->setName(null);
        $this->assertEquals(
            $member->getName(),
            ''
        );
    }

    public function testSetSecretSanta()
    {
        $member1 = new Member();
        $member1->setName('Bjoern');

        $member2 = new Member();
        $member2->setName('Georgi');

        $member1->setSecretSanta($member2);

        $this->assertEquals(
            $member1->getSecretSanta(),
            $member2
        );

        $this->assertEquals(
            $member2->getSecretSanta(),
            null
        );
    }
}