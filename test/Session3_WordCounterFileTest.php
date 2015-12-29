<?php

/**
 * Session 3: WordCounterFileTest - Fixtures, e.g. using a test file.
 * See https://phpunit.de/manual/current/en/fixtures.html
 * See https://phpunit.de/manual/current/en/appendixes.annotations.html
 */
class Session3_WordCounterFileTest extends \PHPUnit_Framework_TestCase
{

    /** @test */
    function shouldReturnCountOfWords()
    {
        $file = "testfile.tmp";
        file_put_contents($file, "Keep the bar green to keep the code clean.");

        $counter = WordCounter::fromFile($file);
        //$this->assertEquals(9, $counter->numberOfWords());

        unlink($file);
    }

    const TEST_FILE = "FileWordCounterTest.tmp";

    /**
     * @before
     */
    function createFreshTestFileForEachTest()
    {
        file_put_contents(
            self::TEST_FILE,
            "Keep the bar green to keep the code clean."
        );
    }

    /**
     * @after
     */
    function deleteTestFile()
    {
        $this->assertTrue(unlink(self::TEST_FILE));
    }

    /** @test */
    function shouldReturnCountOfWordsBetter()
    {
        $counter = WordCounter::fromFile(self::TEST_FILE);
        $this->assertEquals(9, $counter->numberOfWords());
    }

    /** @test */
    function shouldVerifyContainmentOfWord()
    {
        $counter = WordCounter::fromFile(self::TEST_FILE);
        $this->assertTrue($counter->containsWord('bar'));
    }
}
