<?php

/**
 * Session 4: WordCounterTest - testing for Exceptions.
 * See https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.exceptions
 * See https://phpunit.de/manual/current/en/appendixes.annotations.html
 */
class Session4_WordCounterFailureTest extends \PHPUnit_Framework_TestCase
{

    // TODO add the needed code/annotations to test for an expected exception, then
    // TODO enable the tests to complete them

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    function shouldThrowInvalidArgumentExceptionForUnknownWord()
    {
        $counter = new WordCounter("green bar green");
        $counter->ratioOf("missingWord");
    }

    /**
     * @test
     */
    function shouldThrowInvalidArgumentExceptionAlternative()
    {
        $this->setExpectedException('InvalidArgumentException');
        $counter = new WordCounter("green bar green");
        $counter->ratioOf("anotherMissingWord");
    }

    /**
     * @test
     * @expectedException FileNotFoundException
     * @expectedExceptionMessage IamSureThisDoesNotExist.txt
     */
    function shouldThrowExceptionWithFileNameOnMissingFile()
    {
        WordCounter::fromFile("IamSureThisDoesNotExist.txt");
    }

    /**
     * @test
     */
    function shouldCountUniqueWordsCaseInsensitive()
    {
        $this->markTestIncomplete('work in progress, will continue tomorrow');
        $counter = new WordCounter("green bar Green hat");
        $this->assertEquals(["bar", "green", "hat"], $counter->uniqueWords());
    }

    /** @test */
    function fakeTestForExerciseToAvoidPHPUnitWarning()
    {
        // TODO delete this test at the end
    }

}
