<?php

namespace InvadersXX\FilamentJsoneditor\Interfaces;

interface JSONEditorOptions
{
    public function modes(array $modes): self;

    public function hasJs(): bool;

    public function jsUrl(): string;

    public function hasCss(): bool;

    public function cssUrl(): string;
}
