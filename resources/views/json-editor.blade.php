<x-filament-forms::field-wrapper
        :id="$getId()"
        :label="$getLabel()"
        :label-sr-only="$isLabelHidden()"
        :helper-text="$getHelperText()"
        :hint="$getHint()"
        :hint-icon="$getHintIcon()"
        :required="$isRequired()"
        :state-path="$getStatePath()"
>
    <div class="w-full"
         x-load-css="[@js(\Filament\Support\Facades\FilamentAsset::getStyleHref('invaders-filament-jsoneditor', package: 'invaders/jsoneditor'))]"
         data-js-before="app.js"
         x-load-js="[@js(\Filament\Support\Facades\FilamentAsset::getScriptSrc('invaders-filament-jsoneditor', package: 'invaders/jsoneditor'))]"
         data-dispatch="jsoneditor-loaded"
         x-on:jsoneditor-loaded-js.window="start"
         x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            editor: null,
            destroy() {
                this.editor = null;
            },
            start() {
                $nextTick(() => {
                    if(this.editor !== null) {
                        return;
                    }
                    const options = {
                        modes: {{ $getModes() }},
                        history: true,
                        onChange: () => {
                            // onChange callback code if needed
                        },
                        onChangeJSON: (json) => {
                            this.state = JSON.stringify(json);
                        },
                        onChangeText: (jsonString) => {
                            this.state = jsonString;
                        },
                        onValidationError: (errors) => {
                            errors.forEach((error) => {
                                switch (error.type) {
                                    case 'validation': // schema validation error
                                        // Handle schema validation error
                                        break;
                                    case 'error':  // json parse error
                                        console.log(error.message);
                                        break;
                                }
                            });
                        }
                    };
                    if(typeof JSONEditor !== 'undefined') {
                        this.editor = new JSONEditor($refs.editor, options);
                        Alpine.raw(this.editor).set(this.state);
                    }
                })
            }
        }"
         x-cloak
         wire:ignore>
        <div x-ref="editor" class="w-full ace_editor" style="min-height: 30vh;height:{{ $getHeight() }}px"></div>
    </div>
</x-filament-forms::field-wrapper>
