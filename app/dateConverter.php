<?php

namespace App;


public function convertDate($date){

        $date = explode('-', explode(' ', $date)[0]);
        $year = $date[0];
        $month = $date[1];
        $day = $date[2];
         //return $day+1;

        /*
         * check if the year is leap year
         */
        if(($year%4) == 0){
            $leap_year = true;
        }else{
            $leap_year = false;
        }

        /**
         * calculate year and month
         */
        if($month <= 4){
            $year = $year + 7;
        }else{
            $year = $year + 8;
        }

        /**
         * convert the month
         */
        $month += 8;
        if($month > 12){
            $month %= 12;
        }
        // app()->call('App\Http\Controllers\CarController@getCars', [$param1, $param2]);

        /**
         * calculate start and end days
         */
        if($leap_year){
            if(($month == 2) || ($month == 4) || ($month == 5)){
                $day += 8;
            }else if(($month == 3) || ($month == 1)){
                $day += 9;
            }else if(($month == 11) || ($month == 12)){
                $day += 10;
            }else if(($month == 6) || ($month == 7)){
                $day += 9;
            }else if(($month == 8)){
                $day += 8;
            }else if(($month = 9) || ($month = 10)){
                $day += 11;
            }
        }else{
            if(($month == 1) || ($month == 4) || ($month == 5)){
                $day += 8;
            }else if(($month == 3) || ($month == 11) || ($month == 12)){
                $day += 9;
            }else if(($month == 9) || ($month == 10)){
                $day += 10;
            }else if(($month == 2) || ($month == 6) || ($month == 7)){
                $day += 7;
            }else if(($month == 8)){
                $day += 6;
            }
        }
        $date = date('Y-m-d h:i:s', mktime(00,00,00,$month,$day,$year));
        return $date;
    }
    