<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Fast;

/**
 * This class is meant to be the fast code. Here I'll try to make the program as
 * fast as I can.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class Processor
{
    /**
     * The length the combined words should be.
     *
     * @var int
     */
    protected $wordLength;

    /**
     * The file we'll be using to process the data.
     *
     * @var string
     */
    protected $wordListFile;

    /**
     * The actual word list which is filtered.
     *
     * @var array
     */
    protected $wordList = array();

    /**
     * The valid combined words. These are words of $wordLength long.
     *
     * @var array
     */
    protected $validWords = array();

    /**
     * Initiate the processor with the file to process and the maximum length
     * the combined words should be.
     *
     * @param string $wordListFile
     * @param int $wordLength
     */
    public function __construct($wordListFile, $wordLength)
    {
        $this->wordListFile = (string) $wordListFile;
        $this->wordLength = (int) $wordLength;
    }

    /**
     * Retrieve the length that will be used to combine the words.
     *
     * @return int
     */
    public function getWordLength()
    {
        return $this->wordLength;
    }

    /**
     * Retrieve the file we're using to process the data.
     *
     * @return string
     */
    public function getWordListFile()
    {
        return $this->wordListFile;
    }

    /**
     * Load the list in a properly formed array. We'll filter out the words that
     * exceed the given word length and assign them in a way which is
     * search-efficient:
     *
     * array(
     *  word-length => array(
     *      'word' => true,
     *      ...
     *  ),
     *  ...
     * )
     *
     * We'll also be storing a list of valid words, which is $wordLength long.
     * This is also done in a search-efficient way:
     *
     * array(
     *  'word' => true,
     *  ...
     * )
     */
    public function loadList()
    {
        $this->wordList = array_fill(0, $this->getWordLength(), array());

        $handle = fopen($this->GetWordListfile(), "r");
        while (!feof($handle)) {
            $word = trim(fgets($handle));

            if (strlen($word) < $this->getWordLength() && !empty($word)) {
                $this->wordList[strlen($word)][$word] = true;
            } elseif (strlen($word) == $this->getWordLength()) {
                $this->validWords[$word] = true;
            }

            unset($word);
        }

        fclose($handle);
    }

    /**
     * Retrieve the list of words we've loaded.
     *
     * @return array
     */
    public function getWordList()
    {
        return $this->wordList;
    }

    /**
     * Retrieve a list of valid words, which are $wordLength characters long.
     *
     * @return array
     */
    public function getValidWords()
    {
        return $this->validWords;
    }

    /**
     * Retrieve a list of words for a specific length.
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length)
    {
        $wordList = $this->getWordList();
        if (!isset($wordList[$length])) {
            return array();
        }

        return $wordList[$length];
    }

    /**
     * Create a list of valid words for a given list. This means we'll go
     * through each word, check the length and append all the matching length
     * words to it. If it is a valid word, store it.
     *
     * @param array $firstList
     * @return array
     */
    public function createValidWordsForList(array $firstList, $remainingLength)
    {
        $wordList = array();
        $validWords = $this->getValidWords();

        $remainingWords = $this->getWordsForLength($remainingLength);
        foreach ($firstList as $word => $value) {
            foreach ($remainingWords as $rWord => $value) {
                if (isset($validWords[$word . $rWord])) {
                    $wordList[$word . $rWord] = true;
                }
            }
        }

        return $wordList;
    }
}
