<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $url = "https://cuatroenlinea.ddev.site/jugar/1122334455667711223344556677";

    use CreatesApplication;
}
