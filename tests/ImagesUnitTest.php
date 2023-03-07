<?php

namespace App\Tests;
use App\Entity\Image;
use PHPUnit\Framework\TestCase;

class ImagesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $image = new Image();

        $image->setTitle('titre');
        $image->setDescription('description');

        $this->assertTrue($image->getTitle()=== 'titre');
        $this->assertTrue($image->getDescription()=== 'description');
    }
    public function testIsFalse()
    {
        
        $image = new Image();

        $image->setTitle('titre');
        $image->setDescription('description');

        $this->assertFalse($image->getTitle()=== 'false');
        $this->assertFalse($image->getDescription()=== 'false');
    }
    public function testIsEmpty()
    {
        $image = new Image();

        $this->assertEmpty($image->getTitle());
        $this->assertEmpty($image->getDescription());
    }
}
