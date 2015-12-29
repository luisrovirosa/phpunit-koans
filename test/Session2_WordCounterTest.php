<?php

/**
 * Session 2: WordCounterTest - All kind of assertions.
 * See https://phpunit.de/manual/current/en/appendixes.assertions.html
 */
class Session2_WordCounterTest extends \PHPUnit_Framework_TestCase
{

    // TODO add the proper assertions to complete the tests,
    // the test name explains what needs to be verified

    /** @test */
    function shouldCountNumberOfWords()
    {
        $counter = new WordCounter("Keep the bar green to keep the code clean.");
        $this->assertEquals(9, $counter->numberOfWords());
    }

    /** @test */
    function shouldVerifyContainmentOfWord()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertTrue($counter->containsWord('bar'));
    }

    /** @test */
    function shouldVerifyNonContainmentOfWord()
    {
        $counter = new WordCounter("green hat");
        $this->assertFalse($counter->containsWord('red'));
    }

    /** @test */
    function shouldReturnNullForUnknownWordCount()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertNull($counter->countOf('else'));
    }

    /** @test */
    function shouldReturnNotNullWordCountForExistingWord()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertNotNull($counter->countOf('green'));
    }

    /** @test */
    function shouldCountGreenTwice()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertEquals(2, $counter->countOf('green'));
    }

    /** @test */
    function shouldFindUniqueWords()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertEquals(['bar', 'green', 'hat'], $counter->uniqueWords());
    }

    /** @test */
    function shouldContainUniqueWord()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertContains('bar', $counter->uniqueWords());
        $this->assertNotContains('foo', $counter->uniqueWords());
    }

    /** @test */
    function shouldFindNumberOfUniqueWords()
    {
        $counter = new WordCounter("green bar green hat");
        $this->assertCount(3, $counter->uniqueWords());
    }

    /** @test */
    function shouldReturnRatioOfWords()
    {
        $counter = new WordCounter("green bar green");
        $this->assertEquals(0.33, round($counter->ratioOf('bar'), 2));
    }

}
