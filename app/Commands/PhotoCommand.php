<?php

namespace App\Commands;

use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class PhotoCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "foto";

    /**
     * @var string Command Description
     */
    protected $description = "Retorna foto do aquário";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $text = "Foto enviada";
            $path = base_path()."/storage/cam/image.jpg";
            exec("fswebcam {$path} -d /dev/video0 -r 1280x720 -D 3 --jpeg 95 -F 10");

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithPhoto(['photo' => $path]);
        }
    }
}