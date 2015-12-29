<?php

/**
 * Counts words of a text and provides basic analytics of that.
 */
class WordCounter
{

    private $_words;

    static function fromFile($fileName)
    {
        if (!file_exists($fileName)) {
            throw new FileNotFoundException($fileName);
        }
        $contents = file_get_contents($fileName);

        return new WordCounter($contents);
    }

    function __construct($sentence)
    {
        $this->_words = preg_split("/\s+/", $sentence);
    }

    function numberOfWords()
    {
        return count($this->_words);
    }

    /**
     * @return unique words sorted alphabetically.
     */
    function uniqueWords()
    {
        $uniqueWords = array_unique($this->_words);
        sort($uniqueWords);

        return $uniqueWords;
    }

    function containsWord($word)
    {
        return in_array($word, $this->_words);
    }

    function countOf($word)
    {
        $sum = 0;
        foreach ($this->_words as $s) {
            if ($word == $s) {
                $sum++;
            }
        }

        if ($sum > 0) {
            return $sum;
        }

        return null;
    }

    /**
     * @return ratio of this word's occurance against all words.
     */
    function ratioOf($word)
    {
        $count = $this->countOf($word);
        if (!$count) {
            throw new InvalidArgumentException($word . " not in sentence");
        }

        return 1.0 * $count / $this->numberOfWords();
    }

}
