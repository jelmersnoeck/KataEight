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
}
