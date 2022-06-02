<?php

namespace ITEC\class;

class date{
    private int $day;
    private int $month;
    private int $year;
    private DateTime $DateTimeObj;

    public function __construct(int $day, int $month, int $year){
        $this->DateTimeObj = new \DateTime();
        $this->DateTimeObj->setDate($year,$month,$day);
        $this->day=$day;
        $this->month=$month;
        $this->year=$year;
    }

    public static function createDate(int $day, int $month, int $year){
        return new time($day,$month,$year);
    }

    public function __toString(){
        return $this->DateTimeObj->format("j/n/Y");
    }

    public function getDateStr():string{
        return $this->DateTimeObj->format("j/n/Y");
    }

    public function getDayLeft():string{
        $now = new \DateTime();
        return $now->diff($this->DateTimeObj)->format("j");
    }
}