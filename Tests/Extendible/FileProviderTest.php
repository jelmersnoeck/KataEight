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
}
