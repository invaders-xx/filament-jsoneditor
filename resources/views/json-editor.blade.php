@php
    $statePath = $getStatePath();
    if (is_array($statePath) || is_object($statePath) ) {
        $statePath = json_encode($statePath);
    }
@endphp
<x-forms::field-wrapper
    :id="$getId()"
    :label="$getLabel()"
    :label-sr-only="$isLabelHidden()"
    :helper-text="$getHelperText()"
    :hint="$getHint()"
    :hint-icon="$getHintIcon()"
    :required="$isRequired()"
    :state-path="$getStatePath()"
>
    <div x-data="{ state: $wire.entangle('{{ $statePath }}') }"
         x-init="$nextTick(() => {
        const options = {
            modes: {{ $getModes() }},
            history: true,
            onChange: function(){
            },
            onChangeJSON: function(json){
                state=JSON.stringify(json);
            },
            onChangeText: function(jsonString){
                state=jsonString;
            },
            onValidationError: function (errors) {
                errors.forEach((error) => {
                  switch (error.type) {
                    case 'validation': // schema validation error
                      break;
                    case 'error':  // json parse error
                        console.log(error.message);
                      break;
                  }
                })
            }
        };
        if(typeof json_editor !== 'undefined'){
            json_editor = new JSONEditor($refs.editor, options);
            json_editor.set(JSON.parse(state));
        }else{
            let json_editor = new JSONEditor($refs.editor, options);
            json_editor.set(JSON.parse(state));
        }
     })"
         x-cloak
         wire:ignore>
        @unless($isDisabled())
            <div x-ref="editor" class="w-full ace_editor"
                 style="min-height: 30vh;height:{{ $getHeight() }}px"></div>
        @else
            <div
                x-html="state"
                class="max-w-none p-3 prose border border-gray-300 rounded shadow-sm"
            ></div>
        @endunless
    </div>
</x-forms::field-wrapper>

