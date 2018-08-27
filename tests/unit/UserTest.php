<?php

// Note: Only unit test observable behaviour (i.e. test behaviour that is
// observable by a user). So would only test that properties
// can be gotten, not that they're set.

class UserTest extends PHPUnit\Framework\TestCase
{
    protected $user;

    // A built-in PHP unit function that does something before every test.
    // Useful when the setup for each test is complex (and the same).
    public function setup()
    {
      $this->user = new \App\Models\User;
    }

    /** @test */
    public function first_name_is_billy()
    {
      $this->user->setFirstName('Billy');

      // Check that firstName equals 'Billy'
      $this->assertEquals($this->user->getFirstName(), 'Billy');
    }

    /** @test */
    public function last_name_is_smith()
    {
      $this->user->setLastName('Smith');

      // Check that LastName equals 'Smith'
      $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function testFullNameIsReturned()
    {
      $this->user->setFirstName('Billy');
      $this->user->setLastName('Smith');

      $this->assertEquals($this->user->getFullName(), 'Billy Smith');
    }

    public function testFirstAndLastNameAreTrimmed()
    {
      $this->user->setFirstName('   Billy');
      $this->user->setLastName('Smith   ');

      $this->assertEquals($this->user->getFirstName(), 'Billy');
      $this->assertEquals($this->user->getLastName(), 'Smith');
    }

    public function testEmailAddressCanBeSet()
    {
      $this->user->setEmail('billy@codecourse.com');

      $this->assertEquals($this->user->getEmail(), 'billy@codecourse.com');
    }

    public function testEmailVariablesContainCorrectValues()
    {
      $this->user->setFirstName('Billy');
      $this->user->setLastName('Smith');
      $this->user->setEmail('billy@codecourse.com');

      $emailVariables = $this->user->getEmailVariables();

      $this->assertArrayHasKey('full_name', $emailVariables);
      $this->assertArrayHasKey('email', $emailVariables);

      $this->assertEquals($emailVariables['full_name'], 'Billy Smith');
      $this->assertEquals($emailVariables['email'], 'billy@codecourse.com');

    }

}
