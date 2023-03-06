<?php

namespace App\Tests;
use App\Entity\OpeningHour;
use PHPUnit\Framework\TestCase;

class OpeningHoursUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $openinghour = new OpeningHour();

        $openinghour->setDays('jour');
        $openinghour->setHours('heure');

        $this->assertTrue($openinghour->getDays()=== 'jour');
        $this->assertTrue($openinghour->getHours()=== 'heure');
    }
    public function testIsFalse()
    {
        $openinghour = new OpeningHour();

        $openinghour->setDays('jour');
        $openinghour->setHours('heure');

        $this->assertFalse($openinghour->getDays()=== 'false');
        $this->assertFalse($openinghour->getHours()=== 'false');
    }
    public function testIsEmpty()
    {
        $openinghour = new OpeningHour();
        
        $this->assertEmpty($openinghour->getDays());
        $this->assertEmpty($openinghour->getHours());
    }
}
