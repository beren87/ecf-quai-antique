<?php

namespace App\Tests;
use App\Entity\Categories;
use PHPUnit\Framework\TestCase;

class CategoriesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        $categories = new Categories();

        $categories->setTitle('titre');
        $categories->setDescription('description');
        $categories->setPrice(23.99);

        $this->assertTrue($categories->getTitle()=== 'titre');
        $this->assertTrue($categories->getDescription()=== 'description');
        $this->assertTrue($categories->getPrice()=== 23.99);
    }
    public function testIsFalse()
    {
        $categories = new Categories();

        $categories->setTitle('titre');
        $categories->setDescription('description');
        $categories->setPrice(23.99);

        $this->assertFalse($categories->getTitle()=== 'false');
        $this->assertFalse($categories->getDescription()=== 'false');
        $this->assertFalse($categories->getPrice()=== 233.99);
    }
    public function testIsEmpty()
    {
        $categories = new Categories();

        $this->assertEmpty($categories->getTitle());
        $this->assertEmpty($categories->getDescription());
        $this->assertEmpty($categories->getPrice());
    }
}
