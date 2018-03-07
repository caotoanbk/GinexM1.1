<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Revenue extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'revenues';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['team_id', 'amount', 'monthYear'];

    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    
}
