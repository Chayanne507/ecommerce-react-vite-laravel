<x-modal-create>
    <x-modal size="md" wire:target="create,edit,save,update">
        <x-slot name="title">
            {{ $label }}{{ $edit ?? ': ' . $author->name }}
        </x-slot>
        <x-slot name="content">

            <x-form.grid>

                <div class="lg:col-span-3">
                    <x-form.input-label-error wire:model.defer="author.name">Nombre</x-form.input-label-error>
                </div>
                <div class="lg:col-span-5">
                    <x-form.input-label-error wire:model.defer="author.email">Email</x-form.input-label-error>
                </div>

                <div class="lg:col-span-6">
                    <x-form.textarea rows="6" wire:model.defer="author.bio" label="Biografia" />
                </div>

                <div class="lg:col-span-6">
                    <x-form.input-label-error wire:model.defer="author.social1">Twitter</x-form.input-label-error>
                </div>
                <div class="lg:col-span-6">
                    <x-form.input-label-error wire:model.defer="author.social2">Instagram</x-form.input-label-error>
                </div>

                <div class="lg:col-span-3">
                    <x-form.input-file :temp="$img" model="img" :saved="$author->img" label="Imagen" />
                </div>

            </x-form.grid>
        </x-slot>
        <x-slot name="footer">
            <div class="text-right">

                <x-secondary-button x-on:click="show=false" wire:loading.attr="disabled">
                    Cerrar
                </x-secondary-button>

                <x-primary-button x-show="edit" type="button" class="ml-2" wire:click="update"
                    wire:loading.attr="disabled">
                    Editar
                </x-primary-button>

                <x-primary-button x-show="!edit" type="button" class="ml-2" wire:click="save"
                    wire:loading.attr="disabled">
                    Guardar
                </x-primary-button>

            </div>
        </x-slot>
    </x-modal>
    <x-modal-confirmation-delete />
</x-modal-create>
