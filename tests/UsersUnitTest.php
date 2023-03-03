<?php

namespace App\Tests;
use App\Entity\Users;
use PHPUnit\Framework\TestCase;

class UsersUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();

        $users->setEmail('true@mail.fr')
              ->setPassword('password') 
              ->setLastname('nom')
              ->setFirstname('prénom') 
              ->setAddress('adresse')
              ->setZipcode('73000') 
              ->setCity('chambéry'); 

        $this->assertTrue($users->getEmail() === 'true@mail.fr');
        $this->assertTrue($users->getPassword() === 'password');
        $this->assertTrue($users->getLastname() === 'nom');
        $this->assertTrue($users->getFirstname() === 'prénom');
        $this->assertTrue($users->getAddress() === 'adresse');
        $this->assertTrue($users->getZipcode() === '73000');
        $this->assertTrue($users->getCity() === 'chambéry');
    }
    public function testIsFalse()
    {
        $users = new Users();

        $users->setEmail('true@mail.fr')
              ->setPassword('password')
              ->setLastname('nom')
              ->setFirstname('prénom') 
              ->setAddress('adresse')
              ->setZipcode('73000') 
              ->setCity('chambéry'); 

        $this->assertFalse($users->getEmail() === 'false@mail.com');
        $this->assertFalse($users->getPassword() === 'false');
        $this->assertFalse($users->getLastname() === 'false');
        $this->assertFalse($users->getFirstname() === 'false');
        $this->assertFalse($users->getAddress() === 'false');
        $this->assertFalse($users->getZipcode() === 'false');
        $this->assertFalse($users->getCity() === 'false');
    }
    public function testIsEmpty()
    {
        $users = new Users();
        
        $this->assertEmpty($users->getEmail());
        $this->assertEmpty($users->getPassword());
        $this->assertEmpty($users->getLastname());
        $this->assertEmpty($users->getFirstname());
        $this->assertEmpty($users->getAddress());
        $this->assertEmpty($users->getZipcode());
        $this->assertEmpty($users->getCity());
    }
}
