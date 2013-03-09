<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Tests\Extendible;

use JelmerSnoeck\KataEight\Extendible\FileProvider;

/**
 * Validate that the FileProvider generates the expected output to use in the
 * Processor.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class FileProviderTest extends \PHPUnit_Framework_TestCase
{
    protected $filePath;

    public function setUp()
    {
        $this->filePath = __DIR__ . '/../Fixtures/testlist';
    }

    public function test_it_stores_file_path()
    {
        $provider = new FileProvider($this->filePath);
        $this->assertSame($this->filePath, $provider->getFilePath());
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function test_it_errors_on_non_existing_file()
    {
        $provider = new FileProvider('non_existing_file');
    }

    public function test_it_loads_words_to_memory()
    {
        $provider = new FileProvider($this->filePath);
        $this->assertEmpty($provider->getWordList());
        $this->assertEmpty($provider->getValidWords());

        $provider->loadList(6);
        $this->assertNotEmpty($provider->getWordList());
        $this->assertNotEmpty($provider->getValidWords());
    }

    public function test_it_finds_words_for_length()
    {
        $length = 3;
        $provider = new FileProvider($this->filePath);
        $provider->loadList(3);

        $wordList = $provider->getWordsForLength($length);

        // the words are stored as key, which is faster.
        foreach ($wordList as $word => $value) {
            if (strlen($word) != $length) {
                $this->assertTrue(
                    false, "'$word' is not $length characters long."
                );
            }
        }
    }
}
