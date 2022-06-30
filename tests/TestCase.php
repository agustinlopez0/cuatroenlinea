<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    protected $url = "https://cuatroenlinea.ddev.site/jugar/1122334455667712345";
    protected $urlOverflow1 = "https://cuatroenlinea.ddev.site/jugar/44444444";
    protected $urlOverflow2 = "https://cuatroenlinea.ddev.site/jugar/12345678";

    use CreatesApplication;
}
