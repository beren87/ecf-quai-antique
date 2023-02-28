<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\Reservations;
use DateTime;
use PHPUnit\Framework\TestCase; 

class ReservationsUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $reservations = new Reservations();
        $users = new Users();
        $dateTime = new DateTime();
        
        $reservations->setName('nom');
        $reservations->setNumberGuests(6);
        $reservations->setDate($dateTime);
        $reservations->setHours($dateTime);
        $reservations->setAllergies('poisson');
        $reservations->setUsers($users);
        
        $this->assertTrue($reservations->getName()=== 'nom');
        $this->assertTrue($reservations->getNumberGuests()=== 6);
        $this->assertTrue($reservations->getDate()=== $dateTime);
        $this->assertTrue($reservations->getHours()=== $dateTime);
        $this->assertTrue($reservations->getAllergies()=== 'poisson');
        $this->assertTrue($reservations->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $reservations = new Reservations();
        $users = new Users();
        $dateTime = new DateTime();
        
        $reservations->setName('nom');
        $reservations->setNumberGuests(6);
        $reservations->setDate($dateTime);
        $reservations->setHours($dateTime);
        $reservations->setAllergies('soja');
        $reservations->setUsers($users);
        
        $this->assertFalse($reservations->getName()=== 'false');
        $this->assertFalse($reservations->getNumberGuests()=== 66);
        $this->assertFalse($reservations->getDate()=== new DateTime());
        $this->assertFalse($reservations->getHours()=== new DateTime());
        $this->assertFalse($reservations->getAllergies()=== 'sardine');
        $this->assertFalse($reservations->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $reservations = new Reservations();
        
        $this->assertEmpty($reservations->getName());
        $this->assertEmpty($reservations->getNumberGuests());
        $this->assertEmpty($reservations->getDate());
        $this->assertEmpty($reservations->getHours());
        $this->assertEmpty($reservations->getAllergies());
        $this->assertEmpty($reservations->getUsers());
    }
}
