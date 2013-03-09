<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Extendible;

use JelmerSnoeck\KataEight\Extendible\DataList;

/**
 * This class illustrates the extendible way of writing this program. It is
 * mainly based on the fast principle.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class Processor
{
    /**
     * The DataList object we'll be using to grab our data from.
     *
     * @var DataList
     */
    protected $dataList;

    /**
     * Initiate the processor. Here we take a DataList object that we can
     * properly parse.
     *
     * @param DataList $dataList
     */
    public function __construct(DataList $dataList)
    {
        $this->dataList = $dataList;
    }

    /**
     * Retrieve the DataList we're using to read data from.
     *
     * @return DataList
     */
    public function getDataList()
    {
        return $this->dataList;
    }

    /**
     * Load all the words from a specific length from our DataList provider.
     *
     * @param int $length
     */
    public function loadList($length)
    {
        $this->getDataList()->loadList($length);
    }

    /**
     * Fetch a list of words that we've loaded from our DataList.
     *
     * @return array
     */
    public function getWordList()
    {
        return $this->getDataList()->getWordList();
    }

    /**
     * Fetch all the valid words that we've loaded from the DataList provider.
     *
     * @return array
     */
    public function getValidWords()
    {
        return $this->getDataList()->getValidWords();
    }

    /**
     * Retrieve a set of words with a specific length that we've loaded from the
     * DataList provider.
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length)
    {
        return $this->getDataList()->getWordsForLength($length);
    }
}
