<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acesso extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */

    protected $table = 'Acesso';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    // Now declare the relationship with "occasion_categories" table
    public function occasionCategory()
    {
        // Make sure you have used occasion_categories_id as the foreugn key
        return $this->belongsTo('OccasionCategory', 'occasion_categories_id', 'id');
    }
}
