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

        $dishes->setTitle('fondu');
        $dishes->setDescription('fondu savoyarde du quai antique');
        $dishes->setPrice(24.99);
        $dishes->setUsers($users);

        $this->assertTrue($dishes->getTitle()=== 'fondu');
        $this->assertTrue($dishes->getDescription()=== 'fondu savoyarde du quai antique');
        $this->assertTrue($dishes->getPrice()=== 24.99);
        $this->assertTrue($dishes->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $dishes = new Dishes();

        $dishes->setTitle('fondu');
        $dishes->setDescription('fondu savoyarde du quai antique');
        $dishes->setPrice(24);
        $dishes->setUsers($users);

        $this->assertFalse($dishes->getTitle()=== 'tartiflette');
        $this->assertFalse($dishes->getDescription()=== 'tartiflette de la mer');
        $this->assertFalse($dishes->getPrice()=== 26);
        $this->assertFalse($dishes->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $dishes = new Dishes();

        $this->assertEmpty($dishes->getTitle());
        $this->assertEmpty($dishes->getDescription());
        $this->assertEmpty($dishes->getPrice());
        $this->assertEmpty($dishes->getUsers());
    }
}
