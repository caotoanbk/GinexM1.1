<?php

namespace App;

use App\User;
use App\Salary;

class Utility
{
   public function calculateSalaryDepart($month, $type)
    {
        $users = Salary::where('user_type', $type)->where('monthYear', $month)->get();
        $sum = 0;
        foreach ($users as $user) {
            $sum += $user->amount;
        }
        return $sum;

    }
    public function countType($type, $month)
    {
        return count(Salary::where('user_type', $type)->where('monthYear', $month)->get()->toArray());
    }
    
    public function calculateChiphilaodong($team_id, $month)
    {
        return $this->calculatePositionRateTeam($team_id, $month)*$this->calculateSalaryDepart($month, 2) +
        $this->calculateSalariesOfHunterInTeam($team_id, $month) +
        $this->calculatePositionRateTeam($team_id, $month)*$this->calculateSalaryDepart($month, 5) +
        $this->calculatePositionRateTeam($team_id, $month)*$this->calculateSalaryDepart($month, 1)+
        $this->calculatePositionRateTeam($team_id, $month)*$this->calculateSalaryDepart($month, 7)+
        $this->calculatePositionRateTeam($team_id, $month)*$this->calculateSalaryDepart($month, 6)+
        $this->calculateSalariesOfCTVInTeam($team_id, $month);

    }
    public function calculateTongLDKhongbaogomCTV($team_id, $month)
    {
       return $this->calculatePositionRateTeam($team_id, $month) * (
                $this->countType(1, $month) +
                $this->countType(2, $month) +
                $this->countType(5, $month) +
                $this->countType(6, $month) +
                $this->countType(7, $month)
               ) + $this->calculateNumberOfHunterInTeam($team_id, $month);
    }
    public function calculateTongLDBaogomCTV($team_id, $month)
    {
        return $this->calculateTongLDKhongbaogomCTV($team_id, $month) + $this->calculateNumberOfCTVInTeam($team_id, $month);
    }
    public function calculateTeamRatioDepartment($type, $team_id, $month)
    {}
    public function calculateNumberOfHunterInTeam($team_id, $month)
    {
        $revenue = \App\Revenue::where('team_id', $team_id)->where('monthYear', $month)->first();
        if($revenue)
            return $revenue->number_of_member;
        return;
    }
    public function calculateNumberOfCTVInTeam($team_id, $month)
    {
        $revenue = \App\Revenue::where('team_id', $team_id)->where('monthYear', $month)->first();
        if($revenue)
            return $revenue->number_of_ctv;
        return;
    }
    public function calculateSalariesOfHunterInTeam($team_id, $month)
    {
        $salaries = \App\Salary::where('monthYear', $month)->where('team_id', $team_id)->where('user_type', 4)->get();
        if(!$salaries)
            return;
        $sum = 0;
        foreach ($salaries as $s) {
            $sum += $s->amount;
        }
        return $sum;
    }
    public function calculateSalariesOfCTVInTeam($team_id, $month)
    {
        $salaries = \App\Salary::where('monthYear', $month)->where('team_id', $team_id)->where('user_type', 8)->get();
        if(!$salaries)
            return;
        $sum = 0;
        foreach ($salaries as $s) {
            $sum += $s->amount;
        }
        return $sum;
    }
    public function calculatePositionRateTeam($team_id, $month)
    {
        $tongdoanhthu = $this->calculateTongdoanhthu($month);
        if($tongdoanhthu == 0)
            return 0;
        return $this->calculateDoanhthu($team_id, $month)/$tongdoanhthu;
    }
    public function calculateDoanhthu($team_id, $month)
    {
        $revenue = \App\Revenue::where('team_id', $team_id)->where('monthYear', $month)->first();
        if($revenue)
         return $revenue->amount;
        return 0;
    }
    public function calculateTongdoanhthu($month)
    {
        if(!$month)
            return 0;
        $revenues = Revenue::where('monthYear', $month)->get();
        $tong = 0;
        foreach ($revenues as $revenue) {
            $tong += $revenue->amount;
        }
        return $tong;
    }
    
}
