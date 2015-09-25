<?php

namespace GameOfLife\Board\Renderer;

use GameOfLife\Board;

/**
 * GameOfLife\Board\Renderer\Cli
 */
class Cli
{
    /**
     * @var ToArray
     */
    protected $renderer;

    public function __construct()
    {
        $this->renderer = new ToArray();
    }
    /**
     * @param Board $board
     */
    public function render(Board $board)
    {
        $collection = $this->renderer->render($board);

        $stream = fopen('php://output', 'a');

        foreach ($collection as $line) {
            foreach ($line as $row) {
                $cell = $row ? "* " : "  ";
                fputs($stream, $cell);
            }

            fputs($stream, "\n");
        }

        fclose($stream);
    }
}
