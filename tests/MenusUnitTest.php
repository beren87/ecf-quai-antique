<?php

namespace App\Tests;
use App\Entity\Users;
use App\Entity\Menus;
use PHPUnit\Framework\TestCase;

class MenusUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $users = new Users();
        $menus = new Menus();

        $menus->setTitle('titre');
        $menus->setDescription('description');
        $menus->setPrice(23.99);
        $menus->setUsers($users);

        $this->assertTrue($menus->getTitle()=== 'titre');
        $this->assertTrue($menus->getDescription()=== 'description');
        $this->assertTrue($menus->getPrice()=== 23.99);
        $this->assertTrue($menus->getUsers()=== $users);
    }
    public function testIsFalse()
    {
        $users = new Users();
        $menus = new Menus();

        $menus->setTitle('titre');
        $menus->setDescription('description');
        $menus->setPrice(23.99);
        $menus->setUsers($users);

        $this->assertFalse($menus->getTitle()=== 'false');
        $this->assertFalse($menus->getDescription()=== 'false');
        $this->assertFalse($menus->getPrice()=== 233.99);
        $this->assertFalse($menus->getUsers()=== new Users());
    }
    public function testIsEmpty()
    {
        $menus = new Menus();

        $this->assertEmpty($menus->getTitle());
        $this->assertEmpty($menus->getDescription());
        $this->assertEmpty($menus->getPrice());
        $this->assertEmpty($menus->getUsers());
    }
}
