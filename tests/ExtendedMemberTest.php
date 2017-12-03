<?php

use \bjoernffm\SecretSanta\ExtendedMember;

/**
 * @codeCoverageIgnore
 */
class ExtendedMemberTest extends PHPUnit_Framework_TestCase
{
    public function testSetEmail()
    {
        $member = new ExtendedMember();
        $member->setEmail('b.ebbrecht@rl-3.de');

        $this->assertEquals(
            $member->getEmail(),
            'b.ebbrecht@rl-3.de'
        );
    }
}