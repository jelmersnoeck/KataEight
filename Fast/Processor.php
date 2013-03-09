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
     * The file we'll be using to process the data.
     *
     * @var string
     */
    protected $wordListFile;

    /**
     * Initiate the processor with the file to process.
     *
     * @param string $wordListFile
     */
    public function __construct($wordListFile)
    {
        $this->wordListFile = (string) $wordListFile;
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
