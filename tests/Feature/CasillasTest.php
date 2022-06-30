<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CasillasTest extends TestCase
{
    // chequea que haya 42 casillas
    public function test_casillas_inicio()
    {
        $html = file_get_contents($this->url);
        
        $this->assertTrue(substr_count($html, 'mx-1 mt-1 w-24 h-24"></div>') == 42);
    }
}
