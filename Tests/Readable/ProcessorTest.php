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

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_it_errors_on_non_existing_file()
    {
        $processor = new Processor('non_existing_file');
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
                    false, "$word is not $length characters long."
                );
            }
        }
    }

    public function test_it_combines_words_for_specific_length()
    {
        $length = 6;
        $processor = new Processor($this->wordListFile);
        $processor->loadList();
        $wordList = $processor->getWordsWithinRange($length);

        $combinedWords = $processor->combineWordsForLength($wordList, $length);

        foreach ($combinedWords as $word) {
            if (strlen($word) != $length) {
                $this->assertTrue(
                    false, "$word is not $length characters long."
                );
            }
        }
    }

    public function test_it_removes_duplicate_entries()
    {
        $processor = new Processor($this->wordListFile);
        $duplicates = array('example', 'example');

        $this->assertSame(1, count($processor->removeDuplicates($duplicates)));
    }

    public function test_it_return_set_of_valid_words()
    {
        $processor = new Processor($this->wordListFile);
        $wordList = $processor->getCombinedWordsForLength(6);

        $this->assertNotEmpty($wordList);
        $this->assertSame(5, count($wordList));
        // testlist 5
        // wordlist 10799
    }
}
