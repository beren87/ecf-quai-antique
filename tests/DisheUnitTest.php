<?php

namespace App\Tests;
use App\Entity\Dishe;
use PHPUnit\Framework\TestCase;

class DisheUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $dishe = new Dishe();

        $dishe->setTitle('titre');
        $dishe->setDescription('description');
        $dishe->setPrice(23.99);

        $this->assertTrue($dishe->getTitle()=== 'titre');
        $this->assertTrue($dishe->getDescription()=== 'description');
        $this->assertTrue($dishe->getPrice()=== 23.99);
    }
    public function testIsFalse()
    {
        
        $dishe = new Dishe();

        $dishe->setTitle('titre');
        $dishe->setDescription('description');
        $dishe->setPrice(23.99);

        $this->assertFalse($dishe->getTitle()=== 'false');
        $this->assertFalse($dishe->getDescription()=== 'false');
        $this->assertFalse($dishe->getPrice()=== 233.99);
    }
    public function testIsEmpty()
    {
        $dishe = new Dishe();

        $this->assertEmpty($dishe->getTitle());
        $this->assertEmpty($dishe->getDescription());
        $this->assertEmpty($dishe->getPrice());
    }
}
