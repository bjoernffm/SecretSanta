<?php

namespace bjoernffm\SecretSanta;

interface MemberInterface
{
    public function setName($name);
    public function getName();
    public function setSecretSanta(MemberInterface $secretSanta);
    public function getSecretSanta();
}