<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class JuegoTest extends TestCase {
    
    public function test_horizontal(){
        
        $azul = new Ficha("🟦");
        $rojo = new Ficha("🟥");
        $vacio = new Ficha("⬜");

        $tablero_1 = new Tablero();
        $tablero_1->iniciar_tablero([0,1,1,2,5,6,6,2,6,1,4,2,4,4,3,5,3,3]);
        $juego_1 = new Juego($tablero_1);

        $tablero_2 = new Tablero();
        $tablero_2->iniciar_tablero([0,1,2,3,4,5,0,1,2,3,4,5,1,2,3,0,4,1,5,5,6,6,6]);
        $juego_2 = new Juego($tablero_2);

        $tablero_3 = new Tablero();
        $tablero_3->iniciar_tablero([0,0,1,6,2,5,3]);
        $juego_3 = new Juego($tablero_3);
        
        $tablero_4 = new Tablero();
        $tablero_4->iniciar_tablero([2,3,2,3,4,5,4,5,6,0,1,0,1,2,3,2,3,4,5,5,4,6,0,1,6,6,2,3,2,5,3,6,5,0,4,1,6,0,4]);
        $juego_4 = new Juego($tablero_4);
        
        $tablero_5 = new Tablero();
        $tablero_5->iniciar_tablero([2,3,2,3]);
        $juego_5 = new Juego($tablero_5);

        $this->assertEquals($juego_1->horizontal(), $rojo);
        $this->assertEquals($juego_2->horizontal(), $azul);
        $this->assertEquals($juego_3->horizontal(), $azul);
        $this->assertEquals($juego_4->horizontal(), $azul);
        $this->assertEquals($juego_5->horizontal(), $vacio);
    }

}
