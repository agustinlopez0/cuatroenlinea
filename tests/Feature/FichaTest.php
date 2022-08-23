<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class FichaTest extends TestCase {
    
    public function test_color() {
        $ficha_azul = new Ficha("azul");
        $ficha_roja = new Ficha("rojo");


        $this->assertEquals($ficha_azul->get_color(), "azul");
        $this->assertEquals($ficha_roja->get_color(), "rojo");
    }

}
