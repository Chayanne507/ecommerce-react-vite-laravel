<div>
    <div wire:key="attribute-value" x-data="{
        show: @entangle('open').defer,
        edit: false,
    }"
        @modal-edit-attribute-value.window="show = true; edit= true; $wire.edit($event.detail);"
        @modal-create-attribute-value.window="show = true; edit= false; $wire.create();">
        <x-modal size="md" wire:target="create,edit,save">
            <x-slot name="title">
                {{ $label }}
            </x-slot>
            <x-slot name="content">
                <x-form.grid>
                    <div class="lg:col-span-2">
                        <x-form.select wire:model.defer="attribute_value.attribute_id" label="Grupo">
                            @foreach ($attributes as $attribute)
                                <option value="{{ $attribute->id }}">{{ $attribute->name }}</option>
                            @endforeach
                        </x-form.select>
                    </div>
                    <div class="lg:col-span-4">
                        <x-form.input-label-error wire:model.defer="attribute_value.name">Nombre
                        </x-form.input-label-error>
                    </div>

                    <div class="lg:col-span-2">
                        <x-form.select wire:model.defer="attribute_value.in_stock" label="En stock">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </x-form.select>
                    </div>
                    <div class="lg:col-span-2">
                        <x-form.select wire:model.defer="attribute_value.default"
                            label="Valor selecionado por defector">
                            <option value="1">Si</option>
                            <option value="0">No</option>
                        </x-form.select>
                    </div>
                </x-form.grid>
            </x-slot>
            <x-slot name="footer">
                <div class="text-right">
                    <x-form.button-modal-save />
                </div>
            </x-slot>
        </x-modal>

    </div>

    <div wire:key="modal-attribute-value-delete">
        <div x-data="{
            show: @entangle('open_modal_confirmation_delete').defer,
            id_delete: null
        }"
            @open-modal-confirmation-delete-attribute-value.window="show = true;id_delete=$event.detail;">

            <x-modal wire:target="" size="sm">
                <x-slot name="title">
                    Borrar Registro
                </x-slot>
                <x-slot name="content">

                    <div class="sm:flex sm:items-center">
                        <div
                            class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 sm:mx-0 sm:h-10 sm:w-10">
                            <svg class="h-6 w-6 text-red-600" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />
                            </svg>
                        </div>
                        <div class="text-center sm:mt-0 sm:ml-4 sm:text-left">
                            ¿Estás seguro de que deseas eliminar este registros?
                        </div>
                    </div>

                </x-slot>
                <x-slot name="footer">
                    <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                        Cancelar
                    </x-secondary-button>

                    <x-danger-button class="ml-2" x-on:click="$wire.delete(id_delete)" wire:loading.attr="disabled">
                        <span wire:loading.class="hidden" wire:target="delete">Borrar regsitro</span>
                        <span wire:loading wire:target="delete"> Borrando... </span>
                    </x-danger-button>
                </x-slot>
            </x-modal>
        </div>
    </div>
</div>
