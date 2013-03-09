# Coding Kata Eight
This is the solution for "Kata Eight: Conflicting Objectives", which can be
found [here](http://codekata.pragprog.com/2007/01/kata_eight_conf.html).

## Installation
Build the autoload file and - if wanted - install PHPUnit:

    composer.phar install --dev

### Run the benchmarks
To run the benchmarks, simply execute the following code:

    php benchmark.php

This benchmark uses the wordlist file, which contains 235886 words.

### Tests
To run the tests, run the following code:

    ./vendor/bin/phpunit

Note that the tests do not use the actual wordlist file but the testfile which
contains 656 words.

## Readable solution
For the readable solution I've tried to seperate each step and make it as clear
as possible what the logic is behind that process. I've added some minor
optimizations due to the slow behaviour of PHP. In the next section this is
optimized even more.

## Fast solution
For the fast solution I've mainly adopted the same structure as the readable
solution with some minor changes. The main difference is the way the file is
loaded. Instead of loading the data into the values, they're stored as keys.
This is a much faster way to search (with isset() instead of in_array() or
array_search()), though in my opinion it is a little bit less readable at first.
(This is mainly due to the fact that I'm doing something like 'word' => true,
 which can be a bit confusing for people that aren't familiar with the concept.)

## Extendible solution
For the extendible solution I've chosen to encapsulate the data providing
process. This way you can read data from files, the database, APIs, etc. It has
a minor performance drop due to the fact that we're creating another object.
This extendible version is heavily based upon the fast solution.

## Conclusion
Overall, I'd chose the extendible version. This way it is easier to connect
other data sources to the system and it is still fast enough (in comparison to
the readable version). As for readability I have the same opinion as with the
Fast Processor.

## Benchmarks
The benchmarks are made on a Macbook Air, 1.7GHz Intel Core i5, 4GB DD3 @1333

Starting benchmark for the Readable Processor.
Starting run 1
Ending run 1: 5.9200100898743s
Starting run 2
Ending run 2: 5.6041250228882s
Starting run 3
Ending run 3: 5.5342519283295s
Starting run 4
Ending run 4: 5.844260931015s
Starting run 5
Ending run 5: 5.49742603302s

Starting benchmark for the Fast Processor.
Starting run 1
Ending run 1: 1.9709739685059s
Starting run 2
Ending run 2: 1.9630129337311s
Starting run 3
Ending run 3: 2.019257068634s
Starting run 4
Ending run 4: 2.0069499015808s
Starting run 5
Ending run 5: 2.0208330154419s

Starting benchmark for the Extendible Processor.
Starting run 1
Ending run 1: 2.0131740570068s
Starting run 2
Ending run 2: 2.0065979957581s
Starting run 3
Ending run 3: 2.0287590026855s
Starting run 4
Ending run 4: 2.0243620872498s
Starting run 5
Ending run 5: 2.0387260913849s
