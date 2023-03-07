<?php

namespace App\Tests;
use App\Entity\Categorie;
use PHPUnit\Framework\TestCase;

class CategorieUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $category = new Categorie();

        $category->setName('titre');

        $this->assertTrue($category->getName()=== 'titre');
    }
    public function testIsFalse()
    {
        
        $category = new Categorie();

        $category->setName('titre');

        $this->assertFalse($category->getName()=== 'false');
    }
    public function testIsEmpty()
    {
        $category = new Categorie();

        $this->assertEmpty($category->getName());
    }
}
