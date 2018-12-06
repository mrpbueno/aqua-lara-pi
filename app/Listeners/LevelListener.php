<?php

namespace App\Listeners;

use App\Events\LevelEvent;
use App\Repositories\AlertRepository;
use App\Repositories\MessageRepository;
use Telegram;

class LevelListener
{
    /**
     * Handle the event.
     *
     * @param  LevelEvent  $event
     * @return void
     */
    public function handle(LevelEvent $event)
    {
        $level = $event->getLevel();

        if ($level->level > 4.0) {
            $text = "Problema! Nível em {$level->level}cm";
            AlertRepository::setAlert('level','problem', $text, $level->level);
        } else {
            $text = "OK! Nível em {$level->level}cm";
            AlertRepository::setAlert('level','ok', $text, $level->level);
        }
    }
}
