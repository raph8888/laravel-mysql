<?php

namespace App\Services\TextMessage;

use Entity\Config;
use Exception\ConfigException;
use Exception\ValidationException;

use MessageBird\Client;
use MessageBird\Objects\Message;

class TextMessage
{

    public $client = '';
    private $originator;

    public function __construct()
    {
        try {
            $api_key = get_param("message_bird_api_key");
        } catch (ConfigException $e) {
            throw new RuntimeException('MessageBird API key can not be retrieved.');
        }
        
        $this->client = new Client($api_key);
        $this->originator = Config::read('organisation');
    }

    public function sendsms($phone_number = '', $message_text = '')
    {
        if (empty($message_text)) {
            throw new ValidationException('Empty messages are invalid');
        }

        if (strlen($phone_number) < 10) {
            throw new ValidationException(sprintf('The number: %s is incorrect, it must have at'
                . ' least 10 characters', $phone_number));
        }
        
        if (get_param('dev_mode') === true) {
            $phone_number = get_param('dev_sms_recipient');
        } else {
            $phone_number = $this->applyCountryCode($phone_number);
        }
        
        $message = new Message;
        $message->originator = $this->originator;
        $message->recipients = [$phone_number];
        $message->body = $message_text;

        $response = $this->client->messages->create($message);

        return $response;
    }

    public function getcredits()
    {
        $balance = $this->client->balance->read();
        return $balance;
    }
    
    public function applyCountryCode($phone_number)
    {
        if (substr($phone_number, 0, 4) == '0031') {
            return '31' . substr($phone_number, 4);
        } elseif (substr($phone_number, 0, 3) == '316') {
            return $phone_number;
        } elseif (substr($phone_number, 0, 2) == '06') {
            return substr_replace($phone_number,'31', 0, 1);
        }
        
        throw new ValidationException(sprintf('Unexpected format of phone number %s'
            .', expected it starts with 0031, 31 or 316', $phone_number));
    }

}
