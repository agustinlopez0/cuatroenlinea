<?php

namespace App;

class Tablero {
	protected $historial = [];
    protected $display = [];
    /* 
    Display representa la forma gráfica del tablero
    [   Base del tablero
        [(0,0), (0,1), x, x, x, x, x],
        [(1,0), (1,1), x, x, x, x, x],
        [  x  ,   x  , x, x, x, x, x],
        [  x  ,   x  , x, x, x, x, x],
        [  x  ,   x  , x, x, x, x, x],
        [  x  ,   x  , x, x, x, x, x],
        [  x  ,   x  , x, x, x, x, x],
    ]   Parte superior
    */

	public function poner_ficha( Ficha $ficha, int $columna ){
        if( $columna <= 0 || $columna >= 7 ){
            die("overflow-x");
        }

    }

}

?>