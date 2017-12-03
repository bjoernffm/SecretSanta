<?php

namespace bjoernffm\SecretSanta;

class Member implements MemberInterface
{
    protected $name;
    protected $secretSanta;

    public function __construct()
    {
        $this->name = '';
        $this->secretSanta = null;
    }

    public function setName($name) {
        $this->name = (string) $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setSecretSanta(MemberInterface $secretSanta) {
        $this->secretSanta = $secretSanta;
    }

    public function getSecretSanta() {
        return $this->secretSanta;
    }
}