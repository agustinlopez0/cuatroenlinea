<?php

namespace App;

class Ficha {
	protected $color;

    public function __construct( $color ){
        $this->color = $color;
    }

	public function getColor(){
		return $this->color;
	}

}

?>