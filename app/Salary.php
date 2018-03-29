<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Salary extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'salaries';

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
    protected $fillable = ['user_id', 'amount', 'monthYear', 'user_type', 'user_name', 'team_id'];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
    public function getBphanAttribute()
    {
        if($this->user_type == 1) 
            return 'QLKD & Acc.';
        if($this->user_type == 2) 
            return 'Điều hành';
        if($this->user_type == 4) 
            return 'Hunter';
        if($this->user_type == 5) 
            return 'Sales & Marketing';
        if($this->user_type == 6) 
            return 'Nấu ăn';
        if($this->user_type == 7) 
            return 'IT';
        if($this->user_type == 8) 
            return 'CTV';
        return '';
    }

    
}
