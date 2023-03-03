<?php

namespace App\Tests;
use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categories = new Categories();

        $categories->setName('Entrées');

        $this->assertTrue($categories->getName()=== 'Entrées');
    }
    public function testIsFalse()
    {
        $categories = new Categories();

        $categories->setName('Entrées');

        $this->assertFalse($categories->getName()=== 'false');
    }
    public function testIsEmpty()
    {
        $categories = new Categories();

        $this->assertEmpty($categories->getName());
    }
}
