<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Tests\Fast;

use JelmerSnoeck\KataEight\Fast\Processor;

/**
 * This class is meant to be the readable code. Here I'll try to make the
 * program as readable as I can.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */

class ProcessorTest extends \PHPUnit_Framework_TestCase
{
    protected $wordListFile;

    public function setUp()
    {
        $this->wordListFile = __DIR__ . '/../Fixtures/testlist';
        $this->wordLength = 6;
    }

    public function test_it_stores_wordlist_file()
    {
        $processor = new Processor($this->wordListFile, $this->wordLength);
        $this->assertSame($this->wordListFile, $processor->getWordListFile());
        $this->assertSame($this->wordLength, $processor->getWordLength());
    }

    public function test_it_loads_words_to_memory()
    {
        $processor = new Processor($this->wordListFile, $this->wordLength);
        $this->assertEmpty($processor->getWordList());
        $this->assertEmpty($processor->getValidWords());

        $processor->loadList();
        $this->assertNotEmpty($processor->getWordList());
        $this->assertNotEmpty($processor->getValidWords());
    }

    public function test_it_sorts_loaded_words()
    {
        $processor = new Processor($this->wordListFile, $this->wordLength);
        $processor->loadList();
        $wordList = $processor->getWordList();

        $this->assertArrayHasKey(1, $wordList);
        $this->assertNotEmpty($wordList[1]);
        $this->assertArrayHasKey(2, $wordList);
        $this->assertNotEmpty($wordList[2]);
        $this->assertArrayHasKey(3, $wordList);
        $this->assertNotEmpty($wordList[3]);
        $this->assertArrayHasKey(4, $wordList);
        $this->assertNotEmpty($wordList[4]);
        $this->assertArrayHasKey(5, $wordList);
        $this->assertNotEmpty($wordList[5]);
    }

    public function test_it_finds_words_for_length()
    {
        $length = 3;
        $processor = new Processor($this->wordListFile, $this->wordLength);
        $processor->loadList();

        $wordList = $processor->getWordsForLength($length);

        // the words are stored as key, which is faster.
        foreach ($wordList as $word => $value) {
            if (strlen($word) != $length) {
                $this->assertTrue(
                    false, "'$word' is not $length characters long."
                );
            }
        }
    }

    public function test_it_combines_set_of_valid_words()
    {
        $processor = new Processor($this->wordListFile, $this->wordLength);
        $processor->loadList();

        $wordList = $processor->getWordsForLength(2);
        $combinedWords = $processor->createValidWordsForList($wordList, 4);
        $this->assertSame(2, count($combinedWords));
    }
}
