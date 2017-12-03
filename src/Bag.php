<?php

namespace bjoernffm\SecretSanta;

use \Exception;

class Bag
{
    protected $members;

    public function __construct()
    {
        $this->members = [];
    }

    public function addMember(MemberInterface $member)
    {
        $hash = hash('sha256', $member->getName(), false);
        $this->members[$hash] = $member;
    }

    public function getMembers()
    {
        return array_values($this->members);
    }

    public function popMember(array $excludeMembers = [])
    {
        $members = [];
        foreach($this->members as $hash => $member) {
            $add = true;

            foreach($excludeMembers as $excludeMember) {
                if ($member->getName() == $excludeMember->getName()) {
                    $add = false;
                    break;
                }
            }

            if ($add == true) {
                $members[$hash] = $member;
            }
        }

        if (count($members) <= 0) {
            return null;
        }

        $index = mt_rand(0, count($members)-1);
        $hash = array_keys($members)[$index];
        unset($this->members[$hash]);

        return $members[$hash];
    }
}