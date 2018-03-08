<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

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
    protected $fillable = ['name', 'email', 'password', 'team_id', 'type', 'shortname', 'bophan', 'mobile', 'department'];
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function team()
    {
        return $this->belongsTo('App\Team');
    }

    public function salaries()
    {
        return $this->hasMany('App\Salary');
    }

    
}
