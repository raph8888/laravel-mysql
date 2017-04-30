<?php

namespace App\Services\TextMessage;


class TextMessage
{

    const ACCESS_KEY = 'TvvSO0sf8MRQVstHzwoB6ybCx';
    const COPIADORA = 'Copiadora Moc';

    public $client = '';

    public function __construct()
    {

        $this->client = new \MessageBird\Client($this::ACCESS_KEY);

    }

    public function sendsms($phones, $body) {

        $Message = new \MessageBird\Objects\Message();
        $Message->originator = 'MessageBird';
        $Message->recipients = $phones;
        $Message->body = $body;

        $message_status = $this->client->messages->create($Message);

        return $message_status;


    }

    public function getcredits() {
        $balance = $this->client->balance->read();

        return $balance;
    }

}