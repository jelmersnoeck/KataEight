<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Tests\Readable;

use JelmerSnoeck\KataEight\Readable\Processor;

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
    }

    public function test_it_stores_wordlist_file()
    {
        $processor = new Processor($this->wordListFile);
        $this->assertSame($this->wordListFile, $processor->getWordListFile());
    }

    public function test_it_loads_list_of_words_to_memory()
    {
        $processor = new Processor($this->wordListFile);
        $this->assertEmpty($processor->getWordList());

        $processor->loadList();
        $this->assertNotEmpty($processor->getWordList());
    }

    public function test_it_finds_words_within_range()
    {
        $range = 6;
        $processor = new Processor($this->wordListFile);
        $processor->loadList();

        $wordList = $processor->getWordsWithinRange($range);

        foreach ($wordList as $word) {
            if (strlen($word) > 6 - 1) {
                $this->assertTrue(
                    false, "$word is longer than $range characters."
                );
            }
        }
    }

    public function test_it_finds_words_for_specific_length()
    {
        $length = 3;
        $processor = new Processor($this->wordListFile);
        $processor->loadList();

        $wordList = $processor->getWordsForLength($length);

        foreach ($wordList as $word) {
            if (strlen($word) != $length) {
                $this->assertTrue(
                    false, "$word is not $range characters long."
                );
            }
        }
    }
}
