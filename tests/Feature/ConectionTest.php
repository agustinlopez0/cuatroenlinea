<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConectionTest extends TestCase
{
    public function test_conection()
    {
        $response = $this->get('/jugar/1');

        $response->assertStatus(200);
    }
}
