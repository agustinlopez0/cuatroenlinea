<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class TableroTest extends TestCase {
    
    public function test_iniciar_tablero() {
        $tablero = new Tablero();

        $vacio = new Ficha("⬜");

        $res = [[$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
                [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio]];

        
        $tablero->iniciar_tablero();

        $this->assertEquals($tablero->get_display(), $res);        

        // $tablero->mostrar_tablero();
    }

    public function test_poner_fichas() {
        $tablero = new Tablero();
        $tablero->iniciar_tablero();

        $tablero->poner_ficha(0); // r
        $tablero->poner_ficha(1); // a
        $tablero->poner_ficha(2); // r
        $tablero->poner_ficha(1); // a
        $tablero->poner_ficha(5); // r
        $tablero->poner_ficha(6); // a
        $tablero->poner_ficha(6); // r
        $tablero->poner_ficha(6); // a
        $tablero->poner_ficha(2); // r
        $tablero->poner_ficha(1); // a

        $vacio = new Ficha("⬜");
        $rojo = new Ficha("🟥");
        $azul = new Ficha("🟦");

        $res = [
        [$rojo , $vacio, $vacio, $vacio, $vacio, $vacio],
        [$azul , $azul , $azul , $vacio, $vacio, $vacio],
        [$rojo , $rojo , $vacio, $vacio, $vacio, $vacio],
        [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
        [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
        [$rojo , $vacio, $vacio, $vacio, $vacio, $vacio],
        [$azul , $rojo , $azul , $vacio, $vacio, $vacio]];

        // 0121566621
        $this->assertEquals($tablero->get_historial(), [0,1,2,1,5,6,6,6,2,1]);
        $this->assertEquals($tablero->get_display(), $res);
    }

}
