<?php

class fecha{
    public int $dia;
    public int $mes;
    public int $año;

    private static array $meses=[1=>"Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];

    private function __construct(int $dia, int $mes, int $año){
        $this->dia=$dia;
        $this->mes=$mes;
        $this->año=$año;
    }

    public function __toString(){
        return $this->$dia." de ".self::$meses[$this->$mes]." de ".$año.($año<0?" AC":" DC");
    }

    public static function crearFecha(int $dia, int $mes, int $año){
        if(fecha::validarFecha($dia, $mes, $año)){
            return new fecha($dia, $mes, $año);
        }
    }

    private static function validarFecha(int $dia, int $mes, int $año):bool{
        return (
            self::validarMes($mes) &&
            self::validarDia($dia, $mes, $año)
        );
    }

    private static function validarMes(int $mes){
        return 0 < $mes && $mes < 13;
    }


    private static function validarDia(int $dia, int $mes, int $año):bool{
        return self::rangoDia($dia) && self::validar31($dia, $mes) && self::validarBisiesto($dia, $mes, $año);
    }

    private static function rangoDia(int $dia):bool{
        return 0 < $dia && $dia < 32;
    }

    private static function validar31(int $dia, int $mes):bool{
        if($dia == 31 && ($mes == 1 || $mes == 3 || $mes == 5 || $mes == 7 || $mes == 8 || $mes == 10 || $mes == 12))return true;
        if(($dia == 31 || $dia == 30 )&& $mes == 2)return false;
        if($dia < 31)return true;
        return false;
    }


    private static function validarBisiesto(int $dia, int $mes, int $año):bool{
        $visiesto = ($año%4==0 && $año%100==0 && $año%400==0);
        if(!($visiesto && $mes == 2 && $dia==29))return false;
        return true;
    }
}


$fecha1 = fecha::crearFecha(28,7,2003);

echo $fecha1;