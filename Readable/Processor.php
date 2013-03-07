<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Readable;

/**
 * This class is meant to be the readable code. Here I'll try to make the
 * program as readable as I can.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class Processor
{
    /**
     * The wordlist file the processor will be using to generate the
     * combinations.
     *
     * @var string
     */
    protected $wordListFile;

    /**
     * The actual word list, containing all the words.
     *
     * @var array
     */
    protected $wordList = array();

    /**
     * Initiate the processor class and pass through the file path.
     *
     * @param string $wordListFile
     */
    public function __construct($wordListFile)
    {
        $this->wordListFile = (string) $wordListFile;
    }

    /**
     * Retrieve the word list file we're using for this processor.
     *
     * @return string
     */
    public function getWordListFile()
    {
        return $this->wordListFile;
    }

    /**
     * Load the current file into memory. We'll later go trough this list to
     * combine the words.
     */
    public function loadList()
    {
        $this->wordList = file($this->getWordListFile(), FILE_IGNORE_NEW_LINES);
    }

    /**
     * Retrieve the word list we've stored into memory.
     *
     * @return array
     */
    public function getWordList()
    {
        return $this->wordList;
    }

    /**
     * Find words that contain less characters than the given value.
     *
     * @param int $range
     * @return array
     */
    public function getWordsWithinRange($range)
    {
        $wordList = array();

        foreach ($this->getWordList() as $word) {
            if (strlen($word) < $range) {
                $wordList[] = $word;
            }
        }

        return $wordList;
    }

    /**
     * Retrieve a set of words that match a specific length.
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length)
    {
        $wordList = array();

        foreach ($this->getWordList() as $word) {
            if (strlen($word) == $length) {
                $wordList[] = $word;
            }
        }

        return $wordList;
    }

    /**
     * Combine all the words to a specified length.
     *
     * @param array $wordList
     * @param int $length
     * return array
     */
    public function combineWordsForLength(array $wordList, $length)
    {
        $combinedWords = array();

        foreach ($wordList as $word) {
            $remainingWords = $this->getWordsForLength($length - strlen($word));

            foreach ($remainingWords as $remainingWord) {
                $combinedWords[] = $word . $remainingWord;
            }
        }

        return $combinedWords;
    }

    /**
     * Process the file we've initiated this object with and retrieve all the
     * combined words that have a specific length.
     *
     * @param int $length
     * @return array
     */
    public function getCombinedWordsForLength($length)
    {
        $this->loadList();
        $combinedWords = $this->combineWordsForLength(
            $this->getWordsWithinRange($length), $length
        );
        $validWords = array();

        foreach ($combinedWords as $word) {
            if (in_array($word, $this->getWordList())) {
                $validWords[] = $word;
            }
        }

        return $validWords;
    }
}
