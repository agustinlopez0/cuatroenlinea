<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class ClassFichaTest extends TestCase {
    
    public function color_test() {
        $ficha_azul = new Ficha("azul");
        $this->assertEquals($ficha_azul->get_color(), "azul");
        
        $ficha_roja = new Ficha("rojo");
        $this->assertEquals($ficha_roja->get_color(), "rojo");
    }

}
