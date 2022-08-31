<?php

namespace App;

interface FichaInterface {
	public function get_color() : string;
}

class Ficha implements FichaInterface {
	protected $color;

    public function __construct( $color ){
        if( $color !== "🟥" && $color !== "🟦" ){
			throw new \Exception("Solo se permiten fichas azules (🟦) o rojas (🟥)");
		}
		
		$this->$color = $color;
    }

	public function get_color(){
		return $this->color;
	}
}

?>