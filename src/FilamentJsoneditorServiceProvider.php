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
            __DIR__ . '/../dist/jsoneditor/img/jsoneditor-icons.svg' => public_path('filament/assets/img/jsoneditor-icons.svg'),
        ], 'filament-jsoneditor-img');
    }

    public function packageBooted(): void
    {
        FilamentAsset::register([
            Css::make('invaders-filament-jsoneditor', __DIR__ . '/../dist/jsoneditor/jsoneditor.min.css'),
            Js::make('invaders-filament-jsoneditor', __DIR__ . '/../dist/jsoneditor/jsoneditor.min.js')
        ], 'awcodes/headings');
    }
}
