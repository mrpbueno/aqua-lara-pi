<?php

namespace App\Events;

use App\Level;

class LevelEvent
{
    /**
     * @var Level
     */
    private $level;

    /**
     * Create a new event instance.
     *
     * @param Level $level
     */
    public function __construct(Level $level)
    {
        $this->level = $level;
    }

    /**
     * @return Level
     */
    public function getLevel()
    {
        return $this->level;
    }
}
