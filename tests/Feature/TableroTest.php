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

        $tablero->poner_ficha(0);
        $tablero->poner_ficha(1);
        $tablero->poner_ficha(2);
        $tablero->poner_ficha(1);
        $tablero->poner_ficha(5);
        $tablero->poner_ficha(6);
        $tablero->poner_ficha(6);
        $tablero->poner_ficha(6);
        $tablero->poner_ficha(2);
        $tablero->poner_ficha(1);

        $vacio = new Ficha("⬜");
        $azul = new Ficha("🟦");
        $rojo = new Ficha("🟥");

        $res = [
        [$azul , $vacio, $vacio, $vacio, $vacio, $vacio],
        [$rojo , $rojo , $rojo , $vacio, $vacio, $vacio],
        [$azul , $azul , $vacio, $vacio, $vacio, $vacio],
        [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
        [$vacio, $vacio, $vacio, $vacio, $vacio, $vacio],
        [$azul , $vacio, $vacio, $vacio, $vacio, $vacio],
        [$rojo , $azul , $rojo , $vacio, $vacio, $vacio]];

        // $tablero->mostrar_tablero();
        $this->assertEquals($tablero->get_historial(), [0,1,2,1,5,6,6,6,2,1]);
        $this->assertEquals($tablero->get_display(), $res);
    }

    public function test_overflow_y(){
        $this->expectException(\Exception::class);

        $tablero = new Tablero();
        $tablero->iniciar_tablero();
        for($i = 0; $i <= ($tablero->get_max_y + 1); $i++){
            $tablero->poner_ficha(0);
        }
        
    }

    public function test_overflow_x_menor(){
        $this->expectException(\Exception::class);

        $tablero = new Tablero();
        $tablero->iniciar_tablero();

        $tablero->poner_ficha(-1);
        
    }

    public function test_overflow_x_mayor(){
        $this->expectException(\Exception::class);

        $tablero = new Tablero();
        $tablero->iniciar_tablero();

        $tablero->poner_ficha( $tablero->get_max_x + 1 );
    }

}
