<?php

namespace App;

class SMS
{

    static function open_store_sms($horas, $user1, $user2, $valorentrada)
    {

        $message = "O Caixa foi aberto hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de abertura: R$ " . $valorentrada;

        return $message;
    }


    static function close_store_sms($horas, $user1, $user2, $valorsaida)
    {

        $message = "O Caixa foi fechado hoje as " . $horas . " por " . $user1 . " e " . $user2 . " Valor do Caixa no momento de fechamento: R$ " . $valorsaida;

        return $message;
    }

}
