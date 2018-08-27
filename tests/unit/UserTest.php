<?php

// Note: Only unit test observable behaviour (i.e. test behaviour that is
// observable by a user). So would only test that properties
// can be gotten, not that they're set.

class UserTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function first_name_is_billy()
    {
      $user = new \App\Models\User;
      $user->setFirstName('Billy');

      // Check that firstName equals 'Billy'
      $this->assertEquals($user->getFirstName(), 'Billy');
    }

    /** @test */
    public function last_name_is_smith()
    {
      $user = new \App\Models\User;
      $user->setLastName('Smith');

      // Check that LastName equals 'Smith'
      $this->assertEquals($user->getLastName(), 'Smith');
    }

    public function testFullNameIsReturned()
    {
      $user = new \App\Models\User;
      $user->setFirstName('Billy');
      $user->setLastName('Smith');

      $this->assertEquals($user->getFullName(), 'Billy Smith');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
      $user = new \App\Models\User;
      $user->setFirstName('   Billy');
      $user->setLastName('Smith   ');

      $this->assertEquals($user->getFirstName(), 'Billy');
      $this->assertEquals($user->getLastName(), 'Smith');
    }

    public function testEmailAddressCanBeSet()
    {
      $user = new \App\Models\User;
      $user->setEmail('billy@codecourse.com');

      $this->assertEquals($user->getEmail(), 'billy@codecourse.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
      $user = new \App\Models\User;
      $user->setFirstName('Billy');
      $user->setLastName('Smith');
      $user->setEmail('billy@codecourse.com');

      $emailVariables = $user->getEmailVariables();

      $this->assertArrayHasKey('full_name', $emailVariables);
      $this->assertArrayHasKey('email', $emailVariables);

      $this->assertEquals($emailVariables['full_name'], 'Billy Smith');
      $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');

    }

}
