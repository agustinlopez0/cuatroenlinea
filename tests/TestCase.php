<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $url = "https://cuatroenlinea.ddev.site/jugar/1122334455667712345";
    protected $url_overflow_x = "https://cuatroenlinea.ddev.site/jugar/12345678";
    protected $url_overflow_y = "https://cuatroenlinea.ddev.site/jugar/44444444";

    use CreatesApplication;
}
