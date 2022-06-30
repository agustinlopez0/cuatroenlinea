<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ConectionTest extends TestCase
{
    public function test_conection()
    {
        $response = $this->get($this->url);

        $response->assertStatus(200);
    }
}
