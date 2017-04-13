<?php

namespace App;

class SMS
{

    static function open_store_sms($horas, $user1, $user2, $valorentrada)
    {

        $to = "[\"+5538991926473\"]";

        $message = "O Caixa foi aberto hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de abertura: R$ " . $valorentrada;

        $auth_key = "wcMMw7SmTbOkw7kqL7wQlw==";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://platform.clickatell.com/messages");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_VERBOSE, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"content\": \"$message\", \"to\": $to}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "X-Version: 1",

            "Content-Type: application/json",

            "Accept: application/json",

            "Authorization: $auth_key"

        ));

        $result = curl_exec($ch);

        curl_close($ch);

    }


    static function close_store_sms($horas, $user1, $user2, $valorsaida)
    {

        $to = "[\"+5538991926473\"]";

        $message = "O Caixa foi fechado hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de fechamento: R$ " . $valorsaida;

        $authToken = "wcMMw7SmTbOkw7kqL7wQlw==";

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, "https://platform.clickatell.com/messages");

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_POST, 1);

        curl_setopt($ch, CURLOPT_POSTFIELDS, "{\"content\": \"$message\", \"to\": $to}");

        curl_setopt($ch, CURLOPT_HTTPHEADER, array(

            "X-Version: 1",

            "Content-Type: application/json",

            "Accept: application/json",

            "Authorization: $authToken"

        ));

        $result = curl_exec($ch);

        curl_close($ch);

    }

}
