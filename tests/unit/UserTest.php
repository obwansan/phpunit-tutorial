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

}
