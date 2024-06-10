
<div class="py-6">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="container mx-auto p-4">
                <h1 class="text-3xl font-bold mb-4">
                    Pick a date to view events
                </h1>

                <div class="flex items-center justify-between mb-4">
                    <a wire:navigate href="/classes/{{ $week-1 }}" type="submit" class="px-4 py-2 font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </a>

                    <div class="w-full mr-7 rounded-xl">
                        <div class="grid grid-cols-7 gap-4 justify-between w-full bg-gray-200 border border-gray-400 rounded-t-xl m-4 mb-0">
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 rounded-tl-xl hover:bg-gray-300">Mon</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 hover:bg-gray-300">Tue</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 hover:bg-gray-300">Wed</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 hover:bg-gray-300">Thu</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 hover:bg-gray-300">Fri</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 hover:bg-gray-300">Sat</div>
                            <div class="col-span-1 text-center font-medium text-gray-500 p-4 rounded-tr-xl hover:bg-gray-300">Sun</div>
                        </div>
                        <div class="grid grid-cols-7 gap-4 justify-between w-full bg-gray-200 border border-gray-400 rounded-b-xl m-4 mt-0">
                            @foreach($days as $day => $weekday)
                                <div
                                    wire:click="selectDate('{{ $dateRange[$weekday] }}')"
                                    class="col-span-1 text-center font-medium {{ (Carbon\Carbon::parse($dateRange[$weekday])->format('Y-m-d') == $date) ? 'bg-gray-800 text-white' : 'text-gray-500' }} p-4 {{ $day == 0 ? 'rounded-bl-xl' : ($day == 6 ? 'rounded-br-xl' : '') }} hover:bg-gray-300">
                                    <h3 class="text-4xl">
                                        {{ Carbon\Carbon::parse($dateRange[$weekday])->format('d') }}
                                    </h3>
                                    <h5 class="text-xl mt-2">
                                        {{ Carbon\Carbon::parse($dateRange[$weekday])->format('M') }}
                                    </h5>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <a wire:navigate href="/classes/{{ $week+1 }}" class=" px-4 py-2 font-medium text-gray-700 bg-gray-200 rounded-md hover:bg-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </a>
                </div>
                <div class="py-6">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-gray-50 border overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 text-gray-900">
                                <p class="font-medium mb-2">Date: {{ $date }}</p>
{{--                                <p class="text-sm text-gray-500">Europe/Amsterdam Time (20:05)</p>--}}
{{--                                <p class="text-sm text-gray-500">30 min meeting</p>--}}
                            </div>
                            <hr>
                            <div class="p-6 text-gray-900">
                                @foreach($events as $eventId => $event)
                                    @livewire('SingleEvent', ['event' => $event->id])
                                @endforeach
                                    @if(count(@$events) == 0)
{{--                                        <div class="py-6">--}}
{{--                                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">--}}
{{--                                                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
                                                    <div class="p-6 text-gray-900">
                                                        {{ __("You're all caught up. No event") }}
                                                    </div>
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
                                    @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
