<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Extendible;

/**
 * The DataProvider interface which provides a uniform way to load the data we need
 * to execute the processing action.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
interface DataProvider
{
    /**
     * Load all the words within a provided length.
     *
     * @param int $length
     */
    public function loadList($length);

    /**
     * Retrieve all the words we've previously loaded. These words are
     * structured in a search efficient way:
     *
     * array(
     *  word-length => array(
     *      'word' => true,
     *      ...
     *  ),
     *  ...
     * )
     *
     * @return array
     */
    public function getWordList();

    /**
     * Retrieve all the valid words. This should be returned in a search
     * efficient way:
     *
     * array(
     *  'word' => true,
     *  ...
     * )
     *
     * @return array
     */
    public function getValidWords();

    /**
     * Retrieve a set of words with a specific length.
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length);
}
