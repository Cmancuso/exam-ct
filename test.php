<?php
use PHPUnit\Framework\TestCase;

class Animation extends TestCase
{
    // ...

    public function testgoesLeft()
    {
        // Arrange
        $a = new Animation;

        // Act
        $b = $a->animate(1, "....L");

        // Assert
        $this->assertEquals("L", $b->getAmount());
    }

    // ...
}
