<?php

namespace App;

use App\Ficha;

interface TableroInterface {
    public function get_max_x() : int;
    public function get_max_y() : int;
    public function iniciar_tablero() : void;
    public function get_display() : Array;
    public function get_historial() : Array;
    public function mostrar_tablero() :void;
    public function poner_ficha( int $col ) : void;
    public function quitar_ficha( int $col ) : Ficha;
    public function undo() : void;
}

class Tablero implements TableroInterface{
    protected $display = [[]];
    protected $historial = [];
    protected int $max_x = 6;
    protected int $max_y = 5;

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

    public function get_max_y() : int {
        return $max_y;
    }
    public function get_max_x() : int {
        return $max_x;
    }

    public function get_display() : Array {
        return $this->display;
    }

    public function get_historial() : Array {
        return $this->historial;
    }

	public function poner_ficha( int $col ) : void {
        
        if($col > $this->max_x || $col < 0)			    
            throw new \Exception("Overflow-X");

        $vacio = new Ficha('⬜');
        $rojo = new Ficha('🟥');
        $azul = new Ficha('🟦');
        // $this->display[0][0] == $rojo;

        for($i = 0; $i <= $this->max_y; $i++){
            if($this->display[$col][$i] == $vacio){
                if(count($this->historial) % 2 == 0)
                    $this->display[$col][$i] = $azul;
                else
                    $this->display[$col][$i] = $rojo;
                
                array_push($this->historial, $col);
                break;
            }

            if($i == $this->max_y)
			    throw new \Exception("Overflow-Y");
        }
    }

    public function quitar_ficha( int $col ) : Ficha{ //Testear exception
        if($col > $this->max_x || $col < 0)			    
            throw new \Exception("Overflow-X");

        $vacio = new Ficha('⬜');
        $rojo = new Ficha('🟥');
        $azul = new Ficha('🟦');

        for($i = $this->max_y; $i >= 0; $i--){
            if($this->display[$col][$i] != $vacio){
                $res = $this->display[$col][$i];

                $this->display[$col][$i] = $vacio;

                return $res;
            }

        }

		throw new \Exception("Sin fichas para eliminar");
    }

    public function undo() : void {
        $ultimo = array_pop( $this->historial );
        if( $ultimo ){
            $this->quitar_ficha( $ultimo );
        }
    }

    public function iniciar_tablero() : void {
        $casilla_vacia = new Ficha('⬜');

        for($i = 0; $i <= $this->max_x; $i++){
            for($j = 0; $j <= $this->max_y ; $j++){
                
                $this->display[$i][$j] = $casilla_vacia;

            } 
        }

    }

    public function mostrar_tablero() : void {
        for($i = $this->max_y; $i >= 0; $i--){
            for($j = 0; $j <= $this->max_x; $j++){
                echo ($this->display[$j][$i])->get_color();
            } 
            echo "\n";
        }
    }


    
}


?>