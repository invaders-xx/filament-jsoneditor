<?php

namespace InvadersXX\FilamentJsoneditor;

use Filament\Support\Assets\Css;
use Filament\Support\Assets\Js;
use Filament\Support\Facades\FilamentAsset;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class FilamentJsoneditorServiceProvider extends PackageServiceProvider
{
    public static string $name = 'filament-jsoneditor';

    public function configurePackage(Package $package): void
    {
        $package
            ->name(static::$name)
            ->hasConfigFile()
            ->hasAssets()
            ->hasViews();

        $this->publishes([
            __DIR__ . '/../dist/jsoneditor/img/jsoneditor-icons.svg' => public_path('css/awcodes/headings/img/jsoneditor-icons.svg'),
            __DIR__ . '/../dist/jsoneditor/jsoneditor.min.css' => public_path('css/awcodes/headings/jsoneditor.min.css'),
            __DIR__ . '/../dist/jsoneditor/jsoneditor.min.js' => public_path('js/awcodes/headings/jsoneditor.min.js'),
        ], 'filament-jsoneditor');
    }

    public function packageRegistered(): void
    {
        if ($this->app->runningInConsole()) {
            FilamentAsset::register([
                Css::make('invaders-filament-jsoneditor', __DIR__ . '/../dist/jsoneditor/jsoneditor.min.css'),
                Js::make('invaders-filament-jsoneditor', __DIR__ . '/../dist/jsoneditor/jsoneditor.min.js'),
            ], 'awcodes/headings');
        }
    }
}
