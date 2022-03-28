<?php

namespace InvadersXX\FilamentJsoneditor\Interfaces;

interface JSONEditorOptions
{
    public function modes(array $modes): self;
    public function height(int $height) : self;
    public function getHeight(): ?int;
    public function getModes(): ?string;
}
