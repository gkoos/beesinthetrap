# Bees In the Trap
Simple command line game.  
Available commands:  
`hit`: hit a random bee in the hive  
`status`: show the status of the individual bees  
`exit`: finish the game immediately  
`help`: show the available commands

It wasn't clear if dead bees can be hit too or just the ones that are still alive - that would take a few small modifications in the code.

## Installation
```
    composer install
```
The game has no dependencies, composer is only needed for the autoloader and running the tests.

## Running
```
    ./beesinthetrap
```
or on Windows
```
    beesinthetrap.bat
```

## Tests
```
    ./bin/phpunit
```

## Implementation
To implement simple games, the most obvious pattern is the Finite State Machine. However this game is even simpler, so an FSM would be an overkill.
I used the command pattern to interpret the commands and a factory to create the bees in the hive, the rest is pretty straightforward.  
I may have skipped a few setters/getters to decrease the amount of boilerplate code. Also the command pattern somewhat exposes the Game object a bit,
in a bigger project the benefits of better encapsulation outweigh the boilerplate.

