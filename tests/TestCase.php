<?php

namespace Runline\ProfileTool\Tests;

use Illuminate\Support\Facades\Route;
use Orchestra\Testbench\TestCase as Orchestra;
use Runline\ProfileTool\ToolServiceProvider;

abstract class TestCase extends Orchestra
{
    public function setUp()
    {
        parent::setUp();

        Route::middlewareGroup('nova', []);
    }

    protected function getPackageProviders($app)
    {
        return [
            ToolServiceProvider::class,
        ];
    }
}
