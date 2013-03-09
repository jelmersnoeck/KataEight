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
    }

    public function test_it_stores_wordlist_file()
    {
        $processor = new Processor($this->wordListFile);
        $this->assertSame($this->wordListFile, $processor->getWordListFile());
    }
}
