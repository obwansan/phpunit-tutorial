<?php

class UserTest extends PHPUnit\Framework\TestCase
{
    public function testFirstNameIsBilly()
    {
      $user = new \App\Models\User;

      $user->setFirstName('Billy');

      // Check that firstName equals 'Billy'
      $this->assertEquals($user->getFirstName(), 'Billy');
    }

    public function testLastNameIsSmith()
    {
      $user = new \App\Models\User;

      $user->setLastName('Smith');

      // Check that LastName equals 'Smith'
      $this->assertEquals($user->getLastName(), 'Smith');
    }

}
