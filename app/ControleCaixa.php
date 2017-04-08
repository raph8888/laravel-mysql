<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ControleCaixa extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'ControleCaixa';


    /**
     * Doing this because primary key is not id. Dumbass.
     *
    */
    public $primaryKey = 'IDda';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

}
