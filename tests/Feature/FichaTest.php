<?php

namespace Tests\Feature;
namespace App;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;


class FichaTest extends TestCase {
    
    public function test_color() {
        $ficha_azul = new Ficha("🟦");
        $ficha_roja = new Ficha("🟥");


        $this->assertEquals($ficha_azul->get_color(), "🟦");
        $this->assertEquals($ficha_roja->get_color(), "🟥");
    }

    public function test_exception_color(){

        $this->expectException(\Exception::class);
        $a = new Ficha("a");

    }

}
