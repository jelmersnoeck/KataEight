<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Extendible;

use JelmerSnoeck\KataEight\Extendible\DataProvider;

/**
 * This class illustrates the extendible way of writing this program. It is
 * mainly based on the fast principle.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class Processor
{
    /**
     * The DataProvider object we'll be using to grab our data from.
     *
     * @var DataProvider
     */
    protected $dataProvider;

    /**
     * Initiate the processor. Here we take a DataProvider object that we can
     * properly parse.
     *
     * @param DataProvider $dataProvider
     */
    public function __construct(DataProvider $dataProvider)
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * Retrieve the DataProvider we're using to read data from.
     *
     * @return DataProvider
     */
    public function getDataProvider()
    {
        return $this->dataProvider;
    }

    /**
     * Load all the words from a specific length from our DataProvider.
     *
     * @param int $length
     */
    public function loadList($length)
    {
        $this->getDataProvider()->loadList($length);
    }

    /**
     * Fetch a list of words that we've loaded from our DataProvider.
     *
     * @return array
     */
    public function getWordList()
    {
        return $this->getDataProvider()->getWordList();
    }

    /**
     * Fetch all the valid words that we've loaded from the DataProvider.
     *
     * @return array
     */
    public function getValidWords()
    {
        return $this->getDataProvider()->getValidWords();
    }

    /**
     * Retrieve a set of words with a specific length that we've loaded from the
     * DataProvider.
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length)
    {
        return $this->getDataProvider()->getWordsForLength($length);
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

                if (isset($validWords[$rWord . $word])) {
                    $wordList[$rWord . $word] = true;
                }
            }
        }

        return $wordList;
    }

    /**
     * Combine all the words in our word set and find the valid words that are
     * of a specific length.
     *
     * @param int $wordLength
     * @return array
     */
    public function getValidCombinedWords($wordLength)
    {
        $this->loadList($wordLength);
        $validWords = array();
        foreach ($this->getWordList() as $length => $words) {
            if ($length > $wordLength - $length) {
                break;
            }

            $validWords += $this->createValidWordsForList(
                $words, $wordLength - $length);
        }

        return $validWords;
    }
}
