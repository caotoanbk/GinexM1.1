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
    protected $fillable = ['name', 'email', 'password', 'team_id', 'type', 'shortname', 'bophan', 'mobile', 'department', 'active'];
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
    public function getTenVaBophanAttribute(){
        return $this->name.'('.$this->bphan.')';
    }
    public function getBphanAttribute()
    {
        if($this->type == 1) 
            return 'QLKD & Acc.';
        if($this->type == 2) 
            return 'Điều hành';
        if($this->type == 4) 
            return 'Hunter';
        if($this->type == 5) 
            return 'Sales & Marketing';
        if($this->type == 6) 
            return 'Nấu ăn';
        if($this->type == 7) 
            return 'IT';
        if($this->type == 8) 
            return 'CTV';
        return '';
    }

    
}
