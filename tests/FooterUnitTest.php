<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\Footer;
use PHPUnit\Framework\TestCase;

class FooterUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $footer = new Footer();

        $footer->setAddress('adresse');
        $footer->setTelephone('0102030405');
        $footer->setMail('mail@mail.fr');
        $footer->setInstagram('insta');
        $footer->setFacebook('fb');
        $footer->setTwitter('twit');
        $footer->setYoutube('ytb');
        $footer->setUsers($users);

        $this->assertTrue($footer->getAddress()=== 'adresse');
        $this->assertTrue($footer->getTelephone()=== '0102030405');
        $this->assertTrue($footer->getMail()=== 'mail@mail.fr');
        $this->assertTrue($footer->getInstagram()=== 'insta');
        $this->assertTrue($footer->getFacebook()=== 'fb');
        $this->assertTrue($footer->getTwitter()==='twit');
        $this->assertTrue($footer->getYoutube()=== 'ytb');
        $this->assertTrue($footer->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $footer = new Footer();

        $footer->setAddress('adresse');
        $footer->setTelephone('0102030405');
        $footer->setMail('mail@mail.fr');
        $footer->setInstagram('insta');
        $footer->setFacebook('fb');
        $footer->setTwitter('twit');
        $footer->setYoutube('ytb');
        $footer->setUsers($users);

        $this->assertFalse($footer->getAddress()=== 'adresses');
        $this->assertFalse($footer->getTelephone()=== '0102030406');
        $this->assertFalse($footer->getMail()=== 'mails@mail.fr');
        $this->assertFalse($footer->getInstagram()=== 'instag');
        $this->assertFalse($footer->getFacebook()=== 'fbk');
        $this->assertFalse($footer->getTwitter()==='twite');
        $this->assertFalse($footer->getYoutube()=== 'ytbx');
        $this->assertFalse($footer->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $footer = new Footer();

        $this->assertEmpty($footer->getAddress());
        $this->assertEmpty($footer->getTelephone());
        $this->assertEmpty($footer->getMail());
        $this->assertEmpty($footer->getInstagram());
        $this->assertEmpty($footer->getFacebook());
        $this->assertEmpty($footer->getTwitter());
        $this->assertEmpty($footer->getYoutube());
        $this->assertEmpty($footer->getUsers());
    }
}
