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
}
