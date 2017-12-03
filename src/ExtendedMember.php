<?php

namespace bjoernffm\SecretSanta;

class ExtendedMember extends Member implements MemberInterface
{
    protected $email;

    public function setEmail($email) {
        $this->email = (string) $email;
    }

    public function getEmail() {
        return $this->email;
    }
}