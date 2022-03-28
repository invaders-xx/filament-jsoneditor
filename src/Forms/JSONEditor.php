<?php

namespace InvadersXX\FilamentJsoneditor\Forms;

use Filament\Forms\Components\Field;
use InvadersXX\FilamentJsoneditor\Interfaces\JSONEditorOptions;

class JSONEditor extends Field implements JSONEditorOptions
{
    protected int | Closure | null $height = 300;
    protected array | Closure | null $modes = ['code', 'form', 'text', 'tree', 'view', 'preview'];

    public string $view = 'filament-jsoneditor::json-editor';

    public function modes(array $modes): self
    {
        $this->modes = $modes;
        return $this;
    }

    public function height(int $height) : self
    {
        $this->height = $height;
        return $this;
    }

    public function getHeight(): ?int
    {
        return $this->evaluate($this->height);
    }

    public function getModes(): ?string
    {
        return json_encode($this->evaluate($this->modes));
    }
}
