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
    <div class="w-full" x-data="{
            state: $wire.entangle('{{ $getStatePath() }}'),
            isJson: {{ json_encode($getJsonFormatted()) }},
            get formattedState() {
                return this.isJson ? this.state : JSON.parse(this.state)
            }
        }"
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
            json_editor.set(formattedState);
        }else{
            let json_editor = new JSONEditor($refs.editor, options);
            json_editor.set(formattedState);
        }
     })"
         x-cloak
         wire:ignore>
            <div x-ref="editor" class="w-full ace_editor"
                 style="min-height: 30vh;height:{{ $getHeight() }}px"></div>
    </div>
</x-filament-forms::field-wrapper>

