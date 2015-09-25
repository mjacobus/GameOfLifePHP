Game of Life - A PHP Implementation
------------------------------------

After a very fun code retreat delivered by [Urs Reupke](https://github.com/UrsKR)
at [Goodgame Studios](http://goodgamestudios.com) I decided that I wanted to finish that exercise.

That was the [Game of Life](http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life) implementation

Code information:

[![Build Status](https://travis-ci.org/mjacobus/GameOfLifePHP.png?branch=master)](https://travis-ci.org/mjacobus/GameOfLifePHP)
[![Coverage Status](https://coveralls.io/repos/mjacobus/GameOfLifePHP/badge.svg?branch=master)](https://coveralls.io/r/mjacobus/GameOfLifePHP?branch=master)
[![Code Climate](https://codeclimate.com/github/mjacobus/GameOfLifePHP.png)](https://codeclimate.com/github/mjacobus/GameOfLifePHP)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/mjacobus/GameOfLifePHP/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/mjacobus/GameOfLifePHP/?branch=master)

Package information:

[![Latest Stable Version](https://poser.pugx.org/mjacobus/gof/v/stable.svg)](https://packagist.org/packages/mjacobus/gof)
[![Total Downloads](https://poser.pugx.org/mjacobus/gof/downloads.svg)](https://packagist.org/packages/mjacobus/gof)
[![Latest Unstable Version](https://poser.pugx.org/mjacobus/gof/v/unstable.svg)](https://packagist.org/packages/mjacobus/gof)
[![License](https://poser.pugx.org/mjacobus/gof/license.svg)](https://packagist.org/packages/mjacobus/gof)
[![Dependency Status](https://gemnasium.com/mjacobus/GameOfLifePHP.png)](https://gemnasium.com/mjacobus/GameOfLifePHP)

## Rules

The universe of the Game of Life is an infinite two-dimensional orthogonal grid
of square cells, each of which is in one of two possible states, alive or dead.
Every cell interacts with its eight neighbours, which are the cells that are
horizontally, vertically, or diagonally adjacent. At each step in time, the
following transitions occur:

1. Any live cell with fewer than two live neighbours dies, as if caused by under-population. (loneliness death)
2. Any live cell with two or three live neighbours lives on to the next generation. (Happy Community Wont Change)
3. Any live cell with more than three live neighbours dies, as if by overcrowding. (over population death)
4. Any dead cell with exactly three live neighbours becomes a live cell, as if by reproduction. (ThreeLiveNeighboursRessurection)

The initial pattern constitutes the seed of the system. The first generation is
created by applying the above rules simultaneously to every cell in the
seed—births and deaths occur simultaneously, and the discrete moment at which
this happens is sometimes called a tick (in other words, each generation is a
pure function of the preceding one). The rules continue to be applied
repeatedly to create further generations.

Source: [Wikipedia](http://en.wikipedia.org/wiki/Conway%27s_Game_of_Life).


### Usage

### Web

- Clone
- Composer install
- `cd public && php -S localhost:8080`
- Go to [http://localhost:8080](http://localhost:8080)


### CLI

- run `php cli/run.php`

### Installing

#### Installing Via Composer
Append the lib to your requirements key in your composer.json.

```javascript
{
    // composer.json
    // [..]
    require: {
        // append this line to your requirements
        "mjacobus/gof": "*"
    }
}
```

### Alternative install
- Learn [composer](https://getcomposer.org). You should not be looking for an alternative install. It is worth the time. Trust me ;-)
- Follow [this set of instructions](#installing-via-composer)

### Issues/Features proposals

[Here](https://github.com/mjacobus/GameOfLifePHP/issues) is the issue tracker.

## Contributing

Please refer to the [contribuiting guide](https://github.com/mjacobus/GameOfLifePHP/blob/master/CONTRIBUTING.md).

### Lincense
[MIT](MIT-LICENSE)

### Authors

- [Marcelo Jacobus](https://github.com/mjacobus)
