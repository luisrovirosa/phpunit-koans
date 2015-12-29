<?php

/**
 * Session 1: GreeterTest - Your first tests.
 */
class Session1_GreeterTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    function shouldReturnHelloName()
    {
        $greeter = new Greeter();
        $this->assertEquals('Hello Peter', $greeter->greet('Peter'));
    }

    /** @test */
    function shouldReturnHelloForNull()
    {
        $greeter = new Greeter();
        $this->assertEquals('Hello', $greeter->greet(null));
    }

    /** @test */
    function shouldIgnoreWhitespace()
    {
        $greeter = new Greeter();
        // TODO check that "Hello Peter", $greeter->greet(" Peter ")
    }

}
