# SecretSanta

This class provides a very basic but easily extendible package for secret santa.

## Usage

Create members (needs to be an even number), and add them to a game instance. Member classes can be easily extended. See the `ExtendedMember` class for an example.

```php
<?php

use \bjoernffm\SecretSanta\Game;
use \bjoernffm\SecretSanta\ExtendedMember as Member;

require 'vendor/autoload.php';

$member1 = new Member();
$member1->setName('Bjoern');
$member1->setEmail('bjoern@example.com');
$member2 = new Member();
$member2->setName('Georgi');
$member2->setEmail('georgi@example.com');
$member3 = new Member();
$member3->setName('Lizanne');
$member3->setEmail('lizanne@example.com');
$member4 = new Member();
$member4->setName('Pierre');
$member4->setEmail('pierre@example.com');

$game = new Game();
$game->addMember($member1);
$game->addMember($member2);
$game->addMember($member3);
$game->addMember($member4);
$result = $game->getResult();

foreach($result as $member) {
    echo $member->getName() . ' <' . $member->getEmail() . '>';
    echo ' => ';
    echo $member->getSecretSanta()->getName() . ' <' . $member->getSecretSanta()->getEmail() . '>';
    echo PHP_EOL;
}

/*
Georgi <georgi@xxx.com> => Bjoern <bjoern@xxx.com>
Bjoern <bjoern@xxx.com> => Georgi <georgi@xxx.com>
Lizanne <lizanne@xxx.com> => Pierre <pierre@xxx.com>
Pierre <pierre@xxx.com> => Lizanne <lizanne@xxx.com>
*/
```

Have fun using the secret santa package!