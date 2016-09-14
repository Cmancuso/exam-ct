<?php

include_once("./src/index.php");
class AnimationTest extends PHPUnit_Framework_TestCase
{
    // ...

    public function testgoesLeft()
    {
        // Arrange
        $var = new Animation;

        // Act
        $b = $var->animate(1, "....L");
        // Assert
        $correct = array(". . . . X",". . . X .",". . X . .",". X . . .","X . . . .",". . . . ." );
        $this->assertEquals($correct, $b);
    }

    public function testgoesRight()
    {
        // Arrange
        $var = new Animation;

        // Act
        $b = $var->animate(1, "R....");
        // Assert
        $correct = array("X . . . .",". X . . .",". . X . .",". . . X .",". . . . X",". . . . ." );
        $this->assertEquals($correct, $b);
    }
    public function testgoesThrough()
    {
        // Arrange
        $var = new Animation;

        // Act
        $b = $var->animate(1, "R...L");
        // Assert
        $correct = array("X . . . X",". X . X .",". . X . .",". X . X .","X . . . X",". . . . ." );
        $this->assertEquals($correct, $b);
    }
    // ...
}
