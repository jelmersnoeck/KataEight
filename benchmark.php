<?php
/**
 * Jelmer Snoeck - Kata Eight
 *
 * @author    Jelmer Snoeck <jelmer@siphoc.com>
 * @copyright 2013 Jelmer Snoeck
 * @link      http://siphoc.com
 */

use JelmerSnoeck\KataEight\Readable\Processor as ReadableProcessor;
use JelmerSnoeck\KataEight\Fast\Processor as FastProcessor;
use JelmerSnoeck\KataEight\Extendible\Processor as ExtendibleProcessor;
use JelmerSnoeck\KataEight\Extendible\FileProvider;

require_once __DIR__ . '/Tests/bootstrap.php';
$wordList = __DIR__ . '/Tests/Fixtures/wordlist';

echo "\nStarting benchmark for the Readable Processor.\n";
for ($i = 1; $i <= 5; $i++) {
    echo "Starting run $i\n";
    $start = microtime(true);
    $processor = new ReadableProcessor($wordList);
    $processor->getCombinedWordsForLength(6);
    $delta = microtime(true) - $start;
    echo "Ending run $i: {$delta}s\n";
    unset ($start, $processor, $delta);
}

echo "\nStarting benchmark for the Fast Processor.\n";
for ($i = 1; $i <= 5; $i++) {
    echo "Starting run $i\n";
    $start = microtime(true);
    $processor = new FastProcessor($wordList);
    $processor->getValidCombinedWords(6);
    $delta = microtime(true) - $start;
    echo "Ending run $i: {$delta}s\n";
    unset ($start, $processor, $delta);
}

echo "\nStarting benchmark for the Extendible Processor.\n";
for ($i = 1; $i <= 5; $i++) {
    echo "Starting run $i\n";
    $start = microtime(true);
    $provider = new FileProvider($wordList);
    $processor = new ExtendibleProcessor($provider);
    $processor->getValidCombinedWords(6);
    $delta = microtime(true) - $start;
    echo "Ending run $i: {$delta}s\n";
    unset ($start, $processor, $delta, $provider);
}
