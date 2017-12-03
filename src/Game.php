<?php

namespace bjoernffm\SecretSanta;

use Exception;

class Game
{
    protected $memberBag;
    protected $secretSantaBag;

    public function __construct()
    {
        $this->memberBag = new Bag();
        $this->secretSantaBag = new Bag();
    }

    public function addMember(MemberInterface $member) {
        $this->memberBag->addMember($member);
        $this->secretSantaBag->addMember($member);
    }

    public function getResult()
    {
        if (count($this->memberBag->getMembers()) % 2 != 0) {
            throw new Exception('Uneven number of members');
        }

        $memberBagCopy = clone $this->memberBag;
        $secretSantaBagCopy = clone $this->secretSantaBag;

        $resultList = [];

        /**
         * For the unlikely case that the only secret santa for a member is him-
         * or herself, break the loop and restart the result search
         */
        while($member = $memberBagCopy->popMember()) {
            $secretSanta = $secretSantaBagCopy->popMember([$member]);

            if ($secretSanta == null) {
                break;
            }

            $member->setSecretSanta($secretSanta);
            $resultList[] = $member;
        }

        if ($secretSanta != null) {
            return $resultList;
        } else {
            return $this->getResult();
        }
    }
}