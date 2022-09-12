<?php

namespace App;

use App\Ficha;

interface JuegoInterface {
    public function horizontal() : Ficha;
    public function vertical(): bool;
    public function diagonal(): bool;
}

class Juego implements JuegoInterface{

    protected $tablero;

    public function __construct( Tablero $tablero ){

        $this->tablero = $tablero;

    }

    public function horizontal() : Ficha {
        $vacio = new Ficha("⬜");

        for( $j = 0; $j <= $this->tablero->get_max_y(); $j++ ){
            $acum = 1;
            for( $i = 1; $i <= $this->tablero->get_max_x(); $i ++ ){
                if($this->tablero->get_display()[$i - 1][$j] == $this->tablero->get_display()[$i][$j] 
                    && $this->tablero->get_display()[$i][$j] != $vacio)
                    $acum++;
                else
                    $acum = 1;
                
                if( $acum == 4 ){
                    return $this->tablero->get_display()[$i][$j];
                }
            }
        }

        return $vacio;
    }


    public function vertical(): bool {



    }


    public function diagonal(): bool {



    }



}

?>