<?php


namespace App\Commands;


use App\Repositories\RpiRepository;
use App\Repositories\MessageRepository;
use Telegram\Bot\Actions;
use Telegram\Bot\Commands\Command;

class RpiCommand extends Command
{
    /**
     * @var string Command Name
     */
    protected $name = "rpi";

    /**
     * @var string Command Description
     */
    protected $description = "Retorna os parâmetros de monitoramento do Raspberry PI";

    /**
     * @inheritdoc
     */
    public function handle($arguments)
    {
        $chat_id = $this->update->getMessage()->getChat()->getId();

        if ($chat_id == env('CHAT_ID')) {
            $temperature = RpiRepository::temperature();
            $memory = RpiRepository::pi('memory');
            $disk = RpiRepository::pi('disk');
            $cpu = RpiRepository::cpu();
            $uptime = RpiRepository::pi('uptime');
            $uptime += $uptime > 60 ? 30 : 0;
            $days = floor($uptime / 86400);
            $uptime %= 86400;
            $hours = floor($uptime / 3600);
            $uptime %= 3600;
            $minutes = floor($uptime / 60);

            $text = "Raspberry PI:\n";
            $text .= "Temperatura: {$temperature}°C \n";
            $text .= "Memória: {$memory}% \n";
            $text .= "Disco: {$disk}% \n";
            $text .= "CPU: {$cpu}% \n";
            $text .= "Uptime: {$days} dias, {$hours} horas e {$minutes} minutos \n";
            $text .= date('d/m/Y H:i');

            MessageRepository::storeSend($text);

            $this->replyWithChatAction(['action' => Actions::TYPING]);
            $this->replyWithMessage(['text' => $text]);
        }
    }
}