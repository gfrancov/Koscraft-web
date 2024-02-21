<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stats;
use App\Models\User;


class StatsController extends Controller
{

    public function allStats() {
        
        dd(
            Stats::all()
        );

    }

    public static function getTotalTimePlayed($uuid) {

        $userStats = Stats::where('uuid','=',$uuid)->first();

        if($userStats == null) {
            $timeplayed = 0;
        } else {
            $arrActivity = explode("|", $userStats->Activity);
            $timeplayed = "";
            
            foreach($arrActivity as $item) {
        
                $secondItem = explode(".",$item);
                if($secondItem[0] == 'Time_Played') {
                    $timeplayed = explode(":",$secondItem[1])[1];
                }
            
            }
        }

        return $timeplayed;

    }

    public static function getTotalHours($uuid) {

        $userStats = Stats::where('uuid','=',$uuid)->first();

        if($userStats == null) {
            return 0;
        } else {
            $arrActivity = explode("|", $userStats->Activity);
            $time = "";
            $hours = 0;
            
            foreach($arrActivity as $item) {
        
                $secondItem = explode(".",$item);
                if($secondItem[0] == 'Time_Played') {
                    $time = explode(":",$secondItem[1])[1];
                }
            
            }
    
            if($time == "") {
                $hours = 0;    
            } else {
                $seconds = floor($time / 1000);
                $minutes = floor($seconds / 60);
                $hours = floor($minutes / 60);
            }
    
            return $hours;    

        }

    }

    public static function getLastLogin($uuid) {
        $userStats = Stats::where('uuid','=',$uuid)->first();

        if($userStats == null) {

            return 'Indefinido';

        } else {

            $arrActivity = explode("|", $userStats->Activity);
            $lastLogin = "";
            
            foreach($arrActivity as $item) {
        
                $secondItem = explode(":",$item);
                if($secondItem[0] == 'Times_Left.last_date') {
                    $lastLogin = str_replace("Times_Left.last_date:", "", $item);
                }
    
            }
    
            return $lastLogin;
    
        }
    }

    public static function getAllStats($uuid) {

        $userStats = Stats::where('uuid','=',$uuid)->first();
        $totalKills = 0;
        $totalDeaths = 0;

        // Kills
        $arrKills = explode("|", $userStats->Kills);
        foreach($arrKills as $item) {
	
            $secondItem = explode(":",$item);
            if($secondItem[0] == 'Players_Killed.amount') {
                $totalKills = str_replace("Players_Killed.amount:", "", $item);
            }

        }

        $arrDeaths = explode("|", $userStats->Deaths);
        foreach($arrDeaths as $item) {
            $secondItem = explode(":",$item);
            if($secondItem[0] == 'Deaths_By_Player.amount') {
                $totalDeaths = str_replace("Deaths_By_Player.amount:", "", $item);
            }

        }

        if($totalDeaths == 0) {
            $kdr = $totalKills;
        } else {
            $kdr = $totalKills/$totalDeaths;
        }
        
        return [
            'kills' => $totalKills,
            'deaths' => $totalDeaths,
            'kdr' => $kdr
        ];


    }
}
