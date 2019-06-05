<?php

namespace App\Commands;

use App\Repositories\Co2Repository;
use App\Repositories\LevelRepository;
use App\Repositories\LightingRepository;
use App\Repositories\MessageRepository;
use App\Repositories\TemperatureRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;


class AquariumCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "aquario";

    /**
     * @var string Command Description
     */
    protected $description = "Retorna os parâmetros de monitoramento do aquário";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $last = TemperatureRepository::last();
            $min = TemperatureRepository::min(date('Y-m-d'));
            $max = TemperatureRepository::max(date('Y-m-d'));
            $text = "Aquário:\n";
            $text .= "Temp: {$last->temperature}°C - {$last->created_at->format('H:i')} \n";
            $text .= "Max: {$max->temperature}°C - {$max->created_at->format('H:i')} \n";
            $text .= "Min: {$min->temperature}°C - {$min->created_at->format('H:i')} \n";
            $last = LevelRepository::last();
            $text .= "Nível: {$last->level}cm \n";
            $power = LightingRepository::getPower()*100;
            $text .= "Iluminação em {$power}% \n";
            $status = Co2Repository::status();
            $text .= "CO2 {$status} \n";
            $text .= date('d/m/Y H:i');

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => $text]);
        }
    }
}