<?php

namespace Nasirkhan\LaravelCube\Tests;

use Orchestra\Testbench\TestCase as Orchestra;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app): array
    {
        return [
            \Nasirkhan\LaravelCube\CubeServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app): void
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set('database.default', 'testing');
        $app['config']->set('database.connections.testing', [
            'driver'   => 'sqlite',
            'database' => ':memory:',
            'prefix'   => '',
        ]);

        // Setup view path
        $app['config']->set('view.paths', [
            __DIR__.'/../resources/views',
            resource_path('views'),
        ]);

        // Setup default framework
        $app['config']->set('cube.default_framework', 'tailwind');
    }
}
