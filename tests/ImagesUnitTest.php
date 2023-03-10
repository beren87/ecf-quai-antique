<?php

namespace App\Tests;

use App\Entity\Images;
use PHPUnit\Framework\TestCase;

class ImagesUnitTest extends TestCase
{
    public function testIsTrue()
    {
        
        $images = new Images();

        $images->setTitle('titre');
        $images->setDescription('description');
        $images->setFile('file');

        $this->assertTrue($images->getTitle()=== 'titre');
        $this->assertTrue($images->getDescription()=== 'description');
        $this->assertTrue($images->getFile()=== 'file');
    }
    public function testIsFalse()
    {
        
        $images = new Images();

        $images->setTitle('titre');
        $images->setDescription('description');
        $images->setFile('file');

        $this->assertFalse($images->getTitle()=== 'false');
        $this->assertFalse($images->getDescription()=== 'false');
        $this->assertFalse($images->getFile()=== 'false');
    }
    public function testIsEmpty()
    {
        $images = new Images();

        $this->assertEmpty($images->getTitle());
        $this->assertEmpty($images->getDescription());
        $this->assertEmpty($images->getFile());
    }
}
