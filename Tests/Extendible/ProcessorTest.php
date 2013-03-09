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

/**
 * Here we'll see how the extendible processor is working.
 *
 * @author Jelmer Snoeck <jelmer@siphoc.com>
 */
class ProcessorTest extends \PHPUnit_Framework_TestCase
{
    protected $dataList;

    public function setUp()
    {
        $this->dataList = $this->getMock(
            'JelmerSnoeck\KataEight\Extendible\DataList'
        );
    }

    public function test_it_stores_data_list_object()
    {
        $processor = new Processor($this->dataList);
        $this->assertSame($this->dataList, $processor->getDataList());
    }

    public function test_it_loads_list_from_data_list()
    {
        $length = 6;

        $this->dataList->expects($this->once())
            ->method('loadList')->with($length);

        $processor = new Processor($this->dataList);
        $processor->loadList($length);
    }

    public function test_it_gets_word_list()
    {
        $this->dataList->expects($this->once())
            ->method('getWordList')->will($this->returnValue('wordList'));

        $processor = new Processor($this->dataList);
        $this->assertSame('wordList', $processor->getWordList());
    }

    public function test_it_gets_valid_words()
    {
        $this->dataList->expects($this->once())
            ->method('getValidWords')->will($this->returnValue('validWords'));

        $processor = new Processor($this->dataList);
        $this->assertSame('validWords', $processor->getValidWords());
    }

    public function test_it_gets_words_for_length()
    {
        $length = 6;
        $this->dataList->expects($this->once())
            ->method('getWordsForLength')->with($length)
            ->will($this->returnValue('wordsForLength'));

        $processor = new Processor($this->dataList);
        $this->assertSame(
            'wordsForLength',
            $processor->getWordsForLength($length)
        );
    }
}
