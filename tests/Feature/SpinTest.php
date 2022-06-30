<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SpinTest extends TestCase
{
    // chequea que el spin gire cuando se pone el cursor encima
    public function test_animacion_spin()
    {
        $html = file_get_contents($this->url);
        
        $this->assertTrue(substr_count($html, 'hover:animate-spin') == 7);
    }
}
