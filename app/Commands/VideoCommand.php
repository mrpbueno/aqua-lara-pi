<?php

namespace App\Commands;

use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class VideoCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "video";

    /**
     * @var string Command Description
     */
    protected $description = "Retorna vídeo do aquário";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $text = "Vídeo enviado";
            $path = base_path()."/storage/cam/video.avi";
            exec("ffmpeg -t 20 -y -loglevel quiet -f v4l2 -r 10 -s 1280x720 -i /dev/video0 {$path}");

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithVideo(['video' => $path]);
        }
    }
}