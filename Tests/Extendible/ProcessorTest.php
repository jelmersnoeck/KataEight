<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

namespace JelmerSnoeck\KataEight\Tests\Readable;

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
}
