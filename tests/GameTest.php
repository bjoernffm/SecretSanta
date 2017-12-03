<?php

use \bjoernffm\SecretSanta\Game;
use \bjoernffm\SecretSanta\Member;

/**
 * @codeCoverageIgnore
 */
class GameTest extends PHPUnit_Framework_TestCase
{
    public function testContruct()
    {
        $game = new Game();
    }

    /**
     * @expectedException        Exception
     * @expectedExceptionMessage Uneven number of members
     */
    public function testGetResultUneven()
    {
        $member1 = new Member();
        $member1->setName('Bjoern');

        $game = new Game();
        $game->addMember($member1);
        $result = $game->getResult();

        foreach($result as $member) {
            $this->assertNotEquals(
                $member,
                $member->getSecretSanta()
            );

            $this->assertNotNull($member);
            $this->assertNotNull($member->getSecretSanta());
        }
    }

    public function testGetResult()
    {
        $member1 = new Member();
        $member1->setName('Bjoern');
        $member2 = new Member();
        $member2->setName('Georgi');
        $member3 = new Member();
        $member3->setName('Lizanne');
        $member4 = new Member();
        $member4->setName('Pierre');

        $game = new Game();
        $game->addMember($member1);
        $game->addMember($member2);
        $game->addMember($member3);
        $game->addMember($member4);
        $result = $game->getResult();

        foreach($result as $member) {
            $this->assertNotEquals(
                $member,
                $member->getSecretSanta()
            );

            $this->assertNotNull($member);
            $this->assertNotNull($member->getSecretSanta());
        }
    }
}