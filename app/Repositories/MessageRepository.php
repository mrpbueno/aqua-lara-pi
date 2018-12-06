<?php

namespace App\Repositories;

use App\Message;
use Telegram;

class MessageRepository extends Repository
{
    /**
     * MessageRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Message::class);
    }

    /**
     * Salva as mensagens enviadas
     *
     * @param $text
     * @return void
     */
    public static function storeSend($text)
    {
        Message::create([
            'from_id' => env('CHAT_ID'),
            'firist_name' => env('APP_NAME'),
            'chat_id' => env('CHAT_ID'),
            'text' => $text,
            'action' => 'send',
            'date' => strtotime(date('Y-m-d H:i:s'))
        ]);
    }

    /**
     * Salva as mensagens recebidas
     *
     * @param $update
     * @return void
     */
    public static function storeReceive($update)
    {
        MessageRepository::create([
            'from_id' => $update->getMessage()->getFrom()->getId(),
            'firist_name' => $update->getMessage()->getFrom()->getFirst_name(),
            'chat_id' => $update->getMessage()->getChat()->getId(),
            'text' => $update->getMessage()->getText(),
            'action' => 'receive',
            'date' => $update->getMessage()->getDate()
        ]);
    }


    /**
     * Carrega as mensagens recebidas
     *
     * @return void
     */
    public static function getUpdates()
    {
        $updates = Telegram::commandsHandler(false);
        foreach ($updates as $update) {
            self::storeReceive($update);
        }
    }
}