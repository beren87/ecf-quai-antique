<?php

namespace App\Tests;
use App\Entity\Menu;
use PHPUnit\Framework\TestCase;

class MenusUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $menu = new Menu();

        $menu->setTitle('titre');
        $menu->setDescription('description');
        $menu->setPrice(23.99);

        $this->assertTrue($menu->getTitle()=== 'titre');
        $this->assertTrue($menu->getDescription()=== 'description');
        $this->assertTrue($menu->getPrice()=== 23.99);
    }
    public function testIsFalse()
    {
        
        $menu = new Menu();

        $menu->setTitle('titre');
        $menu->setDescription('description');
        $menu->setPrice(23.99);

        $this->assertFalse($menu->getTitle()=== 'false');
        $this->assertFalse($menu->getDescription()=== 'false');
        $this->assertFalse($menu->getPrice()=== 233.99);
    }
    public function testIsEmpty()
    {
        $menu = new Menu();

        $this->assertEmpty($menu->getTitle());
        $this->assertEmpty($menu->getDescription());
        $this->assertEmpty($menu->getPrice());
    }
}
