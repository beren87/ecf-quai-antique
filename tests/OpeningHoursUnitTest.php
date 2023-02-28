<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\OpeningHours;
use DateTime;
use PHPUnit\Framework\TestCase;

class OpeningHoursUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $openinghours = new OpeningHours();
        $datetime = new Datetime();

        $openinghours->setDays('jour');
        $openinghours->setHours('heure');
        $openinghours->setUsers($users);

        $this->assertTrue($openinghours->getDays()=== 'jour');
        $this->assertTrue($openinghours->getHours()=== 'heure');
        $this->assertTrue($openinghours->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $openinghours = new OpeningHours();
        $datetime = new Datetime();

        $openinghours->setDays('jour');
        $openinghours->setHours('heure');
        $openinghours->setUsers($users);

        $this->assertFalse($openinghours->getDays()=== 'false');
        $this->assertFalse($openinghours->getHours()=== 'false');
        $this->assertFalse($openinghours->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $openinghours = new OpeningHours();
        
        $this->assertEmpty($openinghours->getDays());
        $this->assertEmpty($openinghours->getHours());
        $this->assertEmpty($openinghours->getUsers());
    }
}
