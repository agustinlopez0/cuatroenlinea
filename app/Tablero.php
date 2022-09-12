<?php

namespace App;

use App\Ficha;

interface TableroInterface {
    public function poner_ficha(Ficha $ficha, int $col) : void;
    public function iniciar_tablero() : void;
    public function mostrar_tablero();
}

class Tablero {
    protected $display = [[]];
    protected $historial = [];
    protected $maxX = 6;
    protected $maxY = 5;

    /* 
    Display representa la forma gráfica del tablero
    display[x][y]
    [   <- Base del tablero
        [(0,0), (0,1), x, x, x, x],
        [(1,0), (1,1), x, x, x, x],
        [(2,0) ,  x  , x, x, x, x],
        [  x  ,   x  , x, x, x, x],
        [  x  ,   x  , x, x, x, x],
        [  x  ,   x  , x, x, x, x],
        [  x  ,   x  , x, x, x, x]
    ]            Parte superior ->
    */

    public function get_display(){
        return $this->display;
    }

    public function get_historial(){
        return $this->historial;
    }

	public function poner_ficha( int $col ){
        array_push($this->historial, $col);
        
        $vacio = new Ficha('⬜');
        $rojo = new Ficha('🟥');
        $azul = new Ficha('🟦');
        // $this->display[0][0] == $rojo;

        for($i = 0; $i <= $this->maxY; $i++){
            if($this->display[$col][$i] == $vacio){
                if(count($this->historial) % 2 == 0)
                    $this->display[$col][$i] = $azul;
                else
                    $this->display[$col][$i] = $rojo;
                
                break;
            }
        }
    }
    
    public function iniciar_tablero(){
        $casilla_vacia = new Ficha('⬜');

        for($i = 0; $i <= $this->maxX; $i++){
            for($j = 0; $j <= $this->maxY ; $j++){
                
                $this->display[$i][$j] = $casilla_vacia;

            } 
        }

    }

    public function mostrar_tablero(){
        for($i = $this->maxY; $i >= 0; $i--){
            for($j = 0; $j <= $this->maxX; $j++){
                echo ($this->display[$j][$i])->get_color();
            } 
            echo "\n";
        }
    }


    
}


?>