<?php
/**
 * Created by PhpStorm.
 * User: sheldonlynn
 * Date: 2017-11-23
 * Time: 4:50 PM
 */


function __autoload($class){
    require_once($class . ".php");
}

class Date {
    private $year;
    private $month;
    private $day;

    public function __construct($y, $m, $d) {
        if ($d < 0 || $d > 31) {
            throw new InvalidDateException($d . ' is not a valid date; every month must be 1 - 31');
        } else if ($y > 2017) {
            throw new InvalidDateException($y . ' invalid year; must be less than current (2017)');
        } else if ($m < 0 || $m > 12) {
            throw new InvalidDateException($m . ' is not a valid month; must be 1 - 12');
        }

        $this->year = $y;
        $this->month = $m;
        $this->day = $d;
    }

    public function getYear() {
        return $this->year;
    }

    public function getMonth() {
        return $this->month;
    }

    public function getDay() {
        return $this->day;
    }

    public function getMonthName() {
        $dateObj   = DateTime::createFromFormat('!m', $this->month);
        $monthName = $dateObj->format('F');
        $length = strlen($monthName);
        return substr($monthName, 0, $length - 1) . strtoupper($monthName[$length - 1]);
    }
}