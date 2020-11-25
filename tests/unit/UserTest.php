<?php

use PHPUnit\Framework\TestCase;
use \App\Models\User;
class UserTest extends TestCase
{
    protected $user;

    /* setUp() is gonna run before each of your test so
        freshen everything up here and then it just means
        you have less code to write in each of your tests
    */
    public function setUp(): void
    {
//        var_dump('1');
        $this->user = new User;
    }

    /** @test */
    public function testThatWeCanGetTheFirstName()
    {
//        $user = new User;

        $this->user->setFirstName('Billy');

        $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    public function testThatWeCanGetTheLastName()
    {
//        $user = new User;

        $this->user->setLastName('Garrett');

        $this->assertEquals($this->user->getLastName(), 'Garrett');
    }

    public function testFullNameIsReturned()
    {
//        $user = new User;
        $this->user->setFirstName('Billy');
        $this->user->setLastName('Garrett');

        $this->assertEquals($this->user->getFullName(),'Billy Garrett');
    }


    public function testFirstAndLastNameAreTrimmed()
    {
        $user = new User;
        $user->setFirstName(' Billy   ');
        $user->setLastName('        Garrett');

        $this->assertEquals($user->getFirstName(), 'Billy');
        $this->assertEquals($user->getLastName(), 'Garrett');
    }

    public function testEmailAddressCanBeSet()
    {
        $user = new User;
        $user->setEmail('billy@codecourse.com');

        $this->assertEquals($user->getEmail(),'billy@codecourse.com');
    }

    public function testEmailVariableContainCorrectValues()
    {
        $user = new User;
        $user->setFirstName('Billy');
        $user->setLastName('Garrett');
        $user->setEmail('billy@codecourse.com');

        $emailVariables = $user->getEmailVariables();

        $this->assertArrayHasKey('full_name',$emailVariables);
        $this->assertArrayHasKey('email',$emailVariables);

        $this->assertEquals($emailVariables['full_name'],'Billy Garrett');
        $this->assertEquals($emailVariables['email'],'billy@codecourse.com');
    }
}