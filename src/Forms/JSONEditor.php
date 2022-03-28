<?php

namespace InvadersXX\FilamentJsoneditor\Forms;

use Filament\Forms\Components\Field;
use InvadersXX\FilamentJsoneditor\Interfaces\JSONEditorOptions;

class JSONEditor  extends Field implements JSONEditorOptions
{

    public string $view = 'filament-jsoneditor::json-editor';

    public function modes(array $modes): self
    {
        return $this;
    }

    public function hasJs(): bool
    {
        return true;
    }

    public function jsUrl(): string
    {
        $manifest = json_decode(file_get_contents(__DIR__ . '/../../dist/mix-manifest.json'), true);
        return url($manifest['/invaders/json-editor/jsoneditor.min.js']);
    }

    public function hasCss(): bool
    {
        return true;
    }

    public function cssUrl(): string
    {
        $manifest = json_decode(file_get_contents(__DIR__ . '/../../dist/mix-manifest.json'), true);
        return url($manifest['/invaders/json-editor/jsoneditor.min.css']);
    }
}
