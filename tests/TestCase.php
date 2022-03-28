<?php

namespace InvadersXX\FilamentJsoneditor\Tests;

use Illuminate\Database\Eloquent\Factories\Factory;
use InvadersXX\FilamentJsoneditor\FilamentJsoneditorServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'InvadersXX\\FilamentJsoneditor\\Database\\Factories\\'.class_basename($modelName).'Factory'
        );
    }

    protected function getPackageProviders($app)
    {
        return [
            LivewireServiceProvider::class,
            FilamentServiceProvider::class,
            FilamentJsoneditorServiceProvider::class,
        ];
    }

    public function getEnvironmentSetUp($app)
    {
        //config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_filament-jsoneditor_table.php.stub';
        $migration->up();
        */
    }
}
