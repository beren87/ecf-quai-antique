<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\GuestLimit;
use PHPUnit\Framework\TestCase;

class GuestLimitUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $guestlimit = new GuestLimit();

        $guestlimit->setMaxGuests(40);
        $guestlimit->setUsers($users);

        $this->assertTrue($guestlimit->getMaxGuests()=== 40);
        $this->assertTrue($guestlimit->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $guestlimit = new GuestLimit();

        $guestlimit->setMaxGuests(40);
        $guestlimit->setUsers($users);

        $this->assertFalse($guestlimit->getMaxGuests()=== 41);
        $this->assertFalse($guestlimit->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $guestlimit = new GuestLimit();

        $this->assertEmpty($guestlimit->getMaxGuests());
        $this->assertEmpty($guestlimit->getUsers());
    }
}
