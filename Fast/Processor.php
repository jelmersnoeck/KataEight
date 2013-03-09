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
}
