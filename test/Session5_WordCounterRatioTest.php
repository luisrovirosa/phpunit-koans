<?php

/**
 * Session 5: WordCounterTableTest - parametrized/table driven.
 * See https://phpunit.de/manual/current/en/writing-tests-for-phpunit.html#writing-tests-for-phpunit.data-providers
 */
class Session5_WordCounterRatioTest extends \PHPUnit_Framework_TestCase
{

    static function tableData()
    {
        return [
            ["green", "green", 1.0], //
            ["green bar green", "green", 0.66], //
            ["green bar green bar", "green", 0.5], //
            ["green bar green", "bar", 0.33] //
        ];
    }

    /**
     * @test
     * @dataProvider tableData
     */
    function shouldReturnRatioOfGivenWord($sentence, $word, $expectedRratio)
    {
        $counter = new WordCounter($sentence);
        $this->assertEquals($expectedRratio, $counter->ratioOf($word), '', 0.01);
    }

}
