<?php

namespace App\Commands;

use App\Repositories\Co2Repository;
use App\Repositories\LightingRepository;
use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class LightingAutoOnCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "luz-auto-on";

    /**
     * @var string Command Description
     */
    protected $description = "Ativa a iluminação automática";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $text = "Iluminação automática ativada.";

            LightingRepository::autoPower(1);
            Co2Repository::autoPower(1);

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => $text]);

        }
    }
}