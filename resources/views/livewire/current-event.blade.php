<div>

    <div class="py-6">
        <div class="max-w-7xl mx-auto px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mx-auto p-4">

{{--                    <section class="bg-white dark:bg-gray-900">--}}
                        <div class="max-w-screen-xl px-4 py-8 mx-auto text-center lg:py-16 lg:px-6">
                            <figure class="max-w-screen-md mx-auto">
                                <svg class="h-12 mx-auto mb-3 text-gray-400 dark:text-gray-600" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.017 18L14.017 10.609C14.017 4.905 17.748 1.039 23 0L23.995 2.151C21.563 3.068 20 5.789 20 8H24V18H14.017ZM0 18V10.609C0 4.905 3.748 1.038 9 0L9.996 2.151C7.563 3.068 6 5.789 6 8H9.983L9.983 18L0 18Z" fill="currentColor"/>
                                </svg>

                                <blockquote>
{{--                                    <h1 class="max-w-2xl mb-4 text-2xl font-extrabold text-center tracking-tight leading-none md:text-3xl xl:text-4xl">--}}
{{--                                        Events Today--}}
{{--                                    </h1>--}}
                                    <p class="text-4xl font-medium text-gray-900 dark:text-white">Events Today</p>
                                </blockquote>
{{--                                <figcaption class="flex items-center justify-center mt-6 space-x-3">--}}
{{--                                    <img class="w-6 h-6 rounded-full" src="https://flowbite.s3.amazonaws.com/blocks/marketing-ui/avatars/michael-gouch.png" alt="profile picture">--}}
{{--                                    <div class="flex items-center divide-x-2 divide-gray-500 dark:divide-gray-700">--}}
{{--                                        <div class="pr-3 font-medium text-gray-900 dark:text-white">Micheal Gough</div>--}}
{{--                                        <div class="pl-3 text-sm font-light text-gray-500 dark:text-gray-400">CEO at Google</div>--}}
{{--                                    </div>--}}
{{--                                </figcaption>--}}
                            </figure>
                        </div>
{{--                    </section>--}}

                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-gray-50 border overflow-hidden shadow-sm sm:rounded-lg">
{{--                                <div class="p-6 text-gray-900">--}}
{{--                                    <p class="font-medium mb-2">Select a time slot</p>--}}
{{--                                    <p class="text-sm text-gray-500">Europe/Amsterdam Time (20:05)</p>--}}
{{--                                    <p class="text-sm text-gray-500">30 min meeting</p>--}}
{{--                                </div>--}}
{{--                                <hr>--}}
                                <div class="p-6 text-gray-900">
                                    @foreach($events as $eventId => $event)
                                        @livewire('SingleEvent', ['event' => $event->id])
                                    @endforeach
                                    @if(count(@$events) == 0)
                                            <div class="py-6">
                                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                                        <div class="p-6 text-gray-900">
                                                            {{ __("You're all caught up. No upcoming event") }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
