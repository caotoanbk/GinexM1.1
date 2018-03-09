<?php

namespace App;

use App\User;
use App\Salary;

class Utility
{
   public function calculateSalaryDepart($month, $type)
    {
        $users = User::where('type', $type)->where('active', true)->get();
        $sum = 0;
        foreach ($users as $user) {
            $sum += $user->salaries()->where('monthYear', $month)->first()?$user->salaries()->where('monthYear', $month)->first()->amount: 0;
        }
        return $sum;

    }
    public function countType($type)
    {
        return count(User::where('type', $type)->where('active', true)->get()->toArray());
    }
    
}
