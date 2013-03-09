<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Tests\Extendible;

use JelmerSnoeck\KataEight\Extendible\Processor;
use JelmerSnoeck\KataEight\Extendible\FileProvider;

/**
 * Here we'll see how the extendible processor is working.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class ProcessorTest extends \PHPUnit_Framework_TestCase
{
    protected $dataProvider;

    public function setUp()
    {
        $this->dataProvider = $this->getMock(
            'JelmerSnoeck\KataEight\Extendible\DataProvider'
        );
    }

    public function test_it_stores_data_list_object()
    {
        $processor = new Processor($this->dataProvider);
        $this->assertSame($this->dataProvider, $processor->getDataProvider());
    }

    public function test_it_loads_list_from_data_list()
    {
        $length = 6;

        $this->dataProvider->expects($this->once())
            ->method('loadList')->with($length);

        $processor = new Processor($this->dataProvider);
        $processor->loadList($length);
    }

    public function test_it_gets_word_list()
    {
        $this->dataProvider->expects($this->once())
            ->method('getWordList')->will($this->returnValue('wordList'));

        $processor = new Processor($this->dataProvider);
        $this->assertSame('wordList', $processor->getWordList());
    }

    public function test_it_gets_valid_words()
    {
        $this->dataProvider->expects($this->once())
            ->method('getValidWords')->will($this->returnValue('validWords'));

        $processor = new Processor($this->dataProvider);
        $this->assertSame('validWords', $processor->getValidWords());
    }

    public function test_it_gets_words_for_length()
    {
        $length = 6;
        $this->dataProvider->expects($this->once())
            ->method('getWordsForLength')->with($length)
            ->will($this->returnValue('wordsForLength'));

        $processor = new Processor($this->dataProvider);
        $this->assertSame(
            'wordsForLength',
            $processor->getWordsForLength($length)
        );
    }

    public function test_it_combines_set_of_valid_words()
    {
        $this->dataProvider->expects($this->once())->method('getWordsForLength')
            ->with(4)->will($this->returnValue(array(
                'bums' => true, 'here' => true,
            )));
        $this->dataProvider->expects($this->once())->method('getValidWords')
            ->will($this->returnValue(array(
                'albums' => true, 'hereby' => true,
            )));

        $processor = new Processor($this->dataProvider);
        $processor->loadList(6);

        $combinedWords = $processor->createValidWordsForList(
            array('al' => true, 'by' => true), 4);
        $this->assertSame(
            array('albums' => true, 'hereby' => true),
            $combinedWords
        );
    }

    public function test_it_returns_all_combined_valid_words()
    {
        $provider = new FileProvider(__DIR__ . '/../Fixtures/testlist');
        $processor = new Processor($provider);

        $wordList = $processor->getValidCombinedWords(6);
        $this->assertSame(5, count($wordList));
    }
}
