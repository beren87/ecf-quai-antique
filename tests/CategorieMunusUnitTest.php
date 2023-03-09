<?php

namespace App\Tests;

use App\Entity\CategorieMenus;
use PHPUnit\Framework\TestCase;

class CategorieMenusUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $categorymenus = new CategorieMenus();

        $categorymenus->setName('titre');

        $this->assertTrue($categorymenus->getName()=== 'titre');
    }
    public function testIsFalse()
    {
        
        $categorymenus = new CategorieMenus();

        $categorymenus->setName('titre');

        $this->assertFalse($categorymenus->getName()=== 'false');
    }
    public function testIsEmpty()
    {
        $categorymenus = new CategorieMenus();

        $this->assertEmpty($categorymenus->getName());
    }
}
