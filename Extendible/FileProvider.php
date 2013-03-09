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
        $fileData = file($this->getfilePath(), FILE_IGNORE_NEW_LINES);
        foreach ($fileData as $word) {
            if (strlen($word) < $length && !empty($word)) {
                $this->wordList[strlen($word)][$word] = true;
            } elseif (strlen($word) == $length) {
                $this->validWords[$word] = true;
            }
        }
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getWordList()
    {
        return $this->wordList;
    }

    /**
     * {@inheritdoc}
     *
     * @return array
     */
    public function getValidWords()
    {
        return $this->validWords;
    }

    /**
     * {@inheritdoc}
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
     * Get the path to the file we're reading data from.
     *
     * @return string
     */
    public function getFilePath()
    {
        return $this->filePath;
    }
}
