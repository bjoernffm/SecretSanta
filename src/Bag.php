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

    public function addMember($name)
    {
        $hash = hash('sha256', $name, false);
        $this->members[$hash] = $name;
    }

    public function getMembers()
    {
        return array_values($this->members);
    }

    public function popMember(array $excludeMembers = [])
    {
        $members = [];
        foreach($this->members as $member) {
            if (in_array($member, $excludeMembers) == false) {
                $members[] = $member;
            }
        }

        if (count($members) <= 0) {
            throw new Exception('Bag is empty');
        }

        return $members[mt_rand(0, count($members)-1)];
    }
}