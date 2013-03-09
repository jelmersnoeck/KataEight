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
 * The Data Provider that reads the data from a file.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class FileProvider implements DataProvider
{
    /**
     * The file path for the file we're going to read data from.
     *
     * @var string
     */
    protected $filePath;

    /**
     * Initiate the FileProvider with a file path to read data from.
     *
     * @param string $filePath
     */
    public function __construct($filePath)
    {
        if (!file_exists($filePath)) {
            throw new \InvalidArgumentException(
                "The file($filePath) does not exist."
            );
        }

        $this->filePath = (string) $filePath;
    }

    /**
     * {@inheritdoc}
     *
     * @param int $length
     */
    public function loadList($length)
    {
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getWordList()
    {
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getValidWords()
    {
    }

    /**
     * {@inheritdoc}
     *
     * @param int $length
     * @return array
     */
    public function getWordsForLength($length)
    {
    }

    /**
     * Get the path to the file we're reading data from.
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}
