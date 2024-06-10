<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Class') }}
        </h2>
    </x-slot>

    @livewire('NewEvent')

</x-app-layout>
