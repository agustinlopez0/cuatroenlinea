<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CasillasTest extends TestCase
{
    // chequea que haya 42 casillas
    public function test_casillas_inicio(){

        $html = file_get_contents($this->url);
        
        $this->assertTrue(substr_count($html, 'mx-1 mt-1 w-24 h-24"></div>') == 42);
    
    }

    // chequea que haya la cantidad esperada de cada color en una partida
    public function test_colores(){
    
        $html = file_get_contents($this->url);
        
        $this->assertTrue(substr_count($html, '<div class="bg-gray-200 text-center mx-1 mt-1 w-24 h-24"></div>') == 23);
        $this->assertTrue(substr_count($html, '<div class="bg-sky-500 text-center mx-1 mt-1 w-24 h-24"></div>') == 9);
        $this->assertTrue(substr_count($html, '<div class="bg-red-500 text-center mx-1 mt-1 w-24 h-24"></div>') == 10);

    }

    public function test_overflow_x(){
        $response = $this->get($this->url_overflow_x);

        $response->assertStatus(500);
    }
    
    public function test_overflow_y(){
        $response = $this->get($this->url_overflow_y);

        $response->assertStatus(500);
    }
}
