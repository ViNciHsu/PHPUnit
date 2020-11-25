<?php

use PHPUnit\Framework\TestCase;
use \App\Models\User;
class UserTest extends TestCase
{
    public function testThatWeCanGetTheFirstName()
    {
        $user = new User;

        $user->setFirstName('Billy');

        $this->assertEquals($user->getFirstName(), 'Billy');
    }
}