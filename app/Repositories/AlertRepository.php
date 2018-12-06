<?php

namespace App\Repositories;


use App\Alert;
use Telegram;

class AlertRepository extends Repository
{
    /**
     * AlertRepository constructor.
     */
    public function __construct()
    {
        $this->setModel(Alert::class);
    }

    /**
     * @param $event
     * @return bool
     */
    public static function getStatus($event)
    {
        $status = Alert::where('event',$event)->orderBy('id', 'desc')->first();

        return $status;
    }

    public static function setAlert($event, $status, $text, $value)
    {
        $alert = self::getStatus($event);
        if ($alert == null || $alert->status != $status) {
            self::create([
                'status' => $status,
                'event' => $event,
                'value' => $value,
                'text' => $text
            ]);
            MessageRepository::storeSend($text);
            Telegram::sendMessage(['chat_id' => env('CHAT_ID'), 'text' => $text]);
        }
    }
}