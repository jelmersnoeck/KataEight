# Coding Kata Eight
This is the solution for "Kata Eight: Conflicting Objectives", which can be
found [here](http://codekata.pragprog.com/2007/01/kata_eight_conf.html).

## Readable solution
For the readable solution I've tried to seperate each step and make it as clear
as possible what the logic is behind that process. I've added some minor
optimizations due to the slow behaviour of PHP. In the next section this is
optimized even more.

Timers (based on data in the wordlist fixture):

Load list start...
End load list: 0.086088895797729s
Start combining words...
End combining words: 3.3923110961914s
Start filtering out non-existing words...
End filtering out non-existing words: 1.3557069301605s
Total run(s): float(7.0182719230652)

Load list start...
End load list: 0.089102983474731s
Start combining words...
End combining words: 3.132180929184s
Start filtering out non-existing words...
End filtering out non-existing words: 1.4900331497192s
Total run(s): float(7.2190968990326)

Load list start...
End load list: 0.088479995727539s
Start combining words...
End combining words: 3.0611870288849s
Start filtering out non-existing words...
End filtering out non-existing words: 1.5638411045074s
Total run(s): float(7.4384291172028)

Load list start...
End load list: 0.093083143234253s
Start combining words...
End combining words: 3.1662509441376s
Start filtering out non-existing words...
End filtering out non-existing words: 1.5196750164032s
Total run(s): float(7.5187928676605)

Load list start...
End load list: 0.091687917709351s
Start combining words...
End combining words: 3.1996190547943s
Start filtering out non-existing words...
End filtering out non-existing words: 1.5108699798584s
Total run(s): float(7.5613708496094)
