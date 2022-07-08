<?php

namespace Tests;

use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected static bool $setUpHasRanOnce = false;

    /**
     *
     */
    public function setUp(): void
    {
        parent::setUp();
        
        if (!static::$setUpHasRanOnce) {
            Artisan::call('migrate:fresh');
            Artisan::call('db:seed');

            static::$setUpHasRanOnce = true;
        }
    }
}
