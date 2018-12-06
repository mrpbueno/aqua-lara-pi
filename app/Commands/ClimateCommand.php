<?php

namespace App\Commands;

use App\Repositories\ClimateRepository;
use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class ClimateCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "climate";

    /**
     * @var string Command Description
     */
    protected $description = "Retorna os parâmetros de monitoramento do ambiente";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $last = ClimateRepository::last();
            $min = ClimateRepository::min(date('Y-m-d'));
            $max = ClimateRepository::max(date('Y-m-d'));
            $text = "Ambiente:\nTemp: {$last->temperature}°C \n";
            $text .= "Max: {$max[0]->temperature}°C - {$max[0]->created_at->format('H:i')} \n";
            $text .= "Min: {$min[0]->temperature}°C - {$min[0]->created_at->format('H:i')} \n";
            $text .= "Umidade: {$last->humidity}% \n";
            $text .= "Max: {$max[1]->humidity}% - {$max[1]->created_at->format('H:i')} \n";
            $text .= "Min: {$min[1]->humidity}% - {$min[1]->created_at->format('H:i')} \n";
            $text .= date('d/m/Y H:i');

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => $text]);
        }
    }
}