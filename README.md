# Coding Kata Eight
This is the solution for "Kata Eight: Conflicting Objectives", which can be
found [here](http://codekata.pragprog.com/2007/01/kata_eight_conf.html).

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
array_search()).
