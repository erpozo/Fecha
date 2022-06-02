<?php

use PHPUnit\Framework\TestCase;

final class fechaTest extends TestCase{
    function DPhtmlElementTest(){
        $fecha1 = fecha::crearFecha(28,7,2003);
        return [
            "FechaNormal"=>[
                $fecha1,
                "28 de julio de 2003 DC"
            ]
        ];
    }

    /**
     * @dataProvider DPhtmlElementTest
     */
    public function testFechas($fecha,$texto){
        $this->assertEquals($fecha->__toString(),$texto);
    }
}