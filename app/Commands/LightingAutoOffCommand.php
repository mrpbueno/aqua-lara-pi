<?php

namespace App\Commands;

use App\Repositories\Co2Repository;
use App\Repositories\LightingRepository;
use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class LightingAutoOffCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "luz-auto-off";

    /**
     * @var string Command Description
     */
    protected $description = "Desativa a iluminação automática";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $text = "Iluminação automática desativada.";

            LightingRepository::autoPower(0);
            LightingRepository::setPower(0);
            Co2Repository::autoPower(0);
            Co2Repository::setPower(1);

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => $text]);

        }
    }
}