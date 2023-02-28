<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\Images;
use PHPUnit\Framework\TestCase;

class ImagesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $images = new Images();

        $images->setTitle('titre');
        $images->setDescription('description');
        $images->setUsers($users);

        $this->assertTrue($images->getTitle()=== 'titre');
        $this->assertTrue($images->getDescription()=== 'description');
        $this->assertTrue($images->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $images = new Images();

        $images->setTitle('titre');
        $images->setDescription('description');
        $images->setUsers($users);

        $this->assertFalse($images->getTitle()=== 'false');
        $this->assertFalse($images->getDescription()=== 'false');
        $this->assertFalse($images->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $images = new Images();

        $this->assertEmpty($images->getTitle());
        $this->assertEmpty($images->getDescription());
        $this->assertEmpty($images->getUsers());
    }
}
