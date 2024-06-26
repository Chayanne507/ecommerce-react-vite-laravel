@props(['data']) {{-- //collection --}}

<div {{ $attributes->class('relative sm:rounded-lg ') }}>
    <div {{ $attributes->whereStartsWith('wire:target') }} class="absolute inset-0 z-10" wire:loading>
        {{-- <div class=" flex justify-center mt-10">
            <x-dashboard.spinner-loading />
        </div> --}}
    </div>
    @if ($data->isNotEmpty())
        <div wire:loading.class="blur-sm" {{ $attributes->whereStartsWith('wire:target') }}>
            <table class="w-full table-list table-auto">
                {{ $slot }}
            </table>
        </div>
        <div class="text-sm mt-10">
            {{ $data->links() }}
        </div>
    @else
        <div class="text-center">
            <span class=" text-sm text-neutral-500">No hay registros disponibles</span>
        </div>
    @endif



</div>
