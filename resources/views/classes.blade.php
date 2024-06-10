<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Classes') }}
        </h2>
    </x-slot>

{{--    <livewire:EventList></livewire:EventList>--}}
    @livewire('EventList', ['week' => $week])

</x-app-layout>
