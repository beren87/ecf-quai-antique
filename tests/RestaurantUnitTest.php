<?php

namespace App\Tests;
use App\Entity\Restaurant;
use PHPUnit\Framework\TestCase;

class RestaurantUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $restaurant = new Restaurant();

        $restaurant->setAddress('adresse');
        $restaurant->setTelephone('0102030405');
        $restaurant->setMail('mail@mail.fr');
        $restaurant->setInstagram('insta');
        $restaurant->setFacebook('fb');
        $restaurant->setTwitter('twit');
        $restaurant->setYoutube('ytb');

        $this->assertTrue($restaurant->getAddress()=== 'adresse');
        $this->assertTrue($restaurant->getTelephone()=== '0102030405');
        $this->assertTrue($restaurant->getMail()=== 'mail@mail.fr');
        $this->assertTrue($restaurant->getInstagram()=== 'insta');
        $this->assertTrue($restaurant->getFacebook()=== 'fb');
        $this->assertTrue($restaurant->getTwitter()==='twit');
        $this->assertTrue($restaurant->getYoutube()=== 'ytb');
    }
    public function testIsFalse()
    {
       
        $restaurant = new Restaurant();

        $restaurant->setAddress('adresse');
        $restaurant->setTelephone('0102030405');
        $restaurant->setMail('mail@mail.fr');
        $restaurant->setInstagram('insta');
        $restaurant->setFacebook('fb');
        $restaurant->setTwitter('twit');
        $restaurant->setYoutube('ytb');

        $this->assertFalse($restaurant->getAddress()=== 'adresses');
        $this->assertFalse($restaurant->getTelephone()=== '0102030406');
        $this->assertFalse($restaurant->getMail()=== 'mails@mail.fr');
        $this->assertFalse($restaurant->getInstagram()=== 'instag');
        $this->assertFalse($restaurant->getFacebook()=== 'fbk');
        $this->assertFalse($restaurant->getTwitter()==='twite');
        $this->assertFalse($restaurant->getYoutube()=== 'ytbx');
    }
    public function testIsEmpty()
    {
        $restaurant = new Restaurant();

        $this->assertEmpty($restaurant->getAddress());
        $this->assertEmpty($restaurant->getTelephone());
        $this->assertEmpty($restaurant->getMail());
        $this->assertEmpty($restaurant->getInstagram());
        $this->assertEmpty($restaurant->getFacebook());
        $this->assertEmpty($restaurant->getTwitter());
        $this->assertEmpty($restaurant->getYoutube());
    }
}
