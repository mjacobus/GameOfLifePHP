<?php

namespace GameOfLife\Board\Renderer;

use GameOfLife\Board;

/**
 * GameOfLife\Board\Renderer\ToArray
 */
class ToArray
{
    /**
     * @param Board $board
     */
    public function render(Board $board)
    {
        $neighbourhood = $board->toArray();
        $rendered = array();

        foreach ($neighbourhood as $rows) {
            $renderedRow = array();

            foreach ($rows as $cell) {
                $renderedRow[] = $cell->isAlive();
            }

            $rendered[] = $renderedRow;
        }

        return $rendered;
    }
}
