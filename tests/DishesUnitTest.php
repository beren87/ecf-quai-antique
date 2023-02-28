<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\Dishes;
use PHPUnit\Framework\TestCase;

class DishesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $dishes = new Dishes();

        $dishes->setName('nom');
        $dishes->setUsers($users);

        $this->assertTrue($dishes->getName()=== 'nom');
        $this->assertTrue($dishes->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $dishes = new Dishes();

        $dishes->setName('nom');
        $dishes->setUsers($users);

        $this->assertFalse($dishes->getName()=== 'false');
        $this->assertFalse($dishes->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $dishes = new Dishes();

        $this->assertEmpty($dishes->getName());
        $this->assertEmpty($dishes->getUsers());
    }
}
