<div>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-8 px-4 mx-auto max-w-4xl lg:py-16">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">Add a class to schedule</h2>
                    <form wire:submit="save">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="col-span-2">
                                <label for="class" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Class</label>
                                <input wire:model="class" type="text" name="class" id="class" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Class" required>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="venue" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Location/Venue</label>
                                <input wire:model="venue" type="text" name="venue" id="venue" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Venue" required="">
                            </div>
                            <div class="col-span-2">
                                <label for="frequency" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Frequency</label>
                                <select wire:model="frequency" name="frequency" id="frequency" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                                    <option selected>-select-</option>
                                    <option value="once">Once</option>
                                    <option value="repeated">Repeated</option>
                                </select>
                            </div>
                            <hr>
                            <div wire:loading.class="opacity-50" class="hidden col-span-2" id="repeat_schedules">
                                @foreach($weekdays as $weekday)
                                    <div class="flex">
                                        <div class="flex-1 p-2">
                                            <label class="relative inline-flex items-center cursor-pointer">
                                                <input wire:model="day.{{ $weekday }}" name="day[]" type="checkbox" value="{{ $weekday }}" class="sr-only peer weekday">
                                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full rtl:peer-checked:after:-translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:start-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                                <span class="ms-3 text-sm font-medium text-gray-900 dark:text-gray-300">{{ ucfirst($weekday) }}</span>
                                            </label>
                                        </div>
                                        <div class="flex-2">
                                            <div class="flex items-center">
                                                <span class="mx-4 text-gray-500">From</span>
                                                <div class="relative">
                                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <input disabled wire:model="start.{{ $weekday }}" name="start[]" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start" >
                                                </div>
                                                <span class="mx-4 text-gray-500">to</span>
                                                <div class="relative">
                                                    <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                        <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                                    </div>
                                                    <input disabled wire:model="end.{{ $weekday }}" name="end[]" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end" >
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div wire:loading.class="opacity-50" class="hidden col-span-2 flex" id="single_schedules">
                                <div class="relative max-w-sm">
                                    <div class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                                        </svg>
                                    </div>
                                    <input wire:model="date" type="date" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                                </div>
                                <div class="">
                                    <div class="flex items-center">
                                        <span class="mx-4 text-gray-500">From</span>
                                        <div class="relative">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input wire:model="sStart" name="start" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date start" >
                                        </div>
                                        <span class="mx-4 text-gray-500">to</span>
                                        <div class="relative">
                                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                            </div>
                                            <input wire:model="sEnd" name="end" type="time" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date end" >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-900 hover:bg-gray-800">
                            Save
                        </button>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            var frequencySelector = document.getElementById('frequency');
                            var repeatSchedules = document.getElementById('repeat_schedules');
                            var singleSchedules = document.getElementById('single_schedules');

                            frequencySelector.addEventListener('change', function () {
                                if (frequencySelector.value === 'once') {
                                    repeatSchedules.classList.add('hidden');
                                    singleSchedules.classList.remove('hidden');
                                } else if (frequencySelector.value === 'repeated') {
                                    repeatSchedules.classList.remove('hidden');
                                    singleSchedules.classList.add('hidden');
                                } else {
                                    repeatSchedules.classList.add('hidden');
                                    singleSchedules.classList.add('hidden');
                                }
                            });

                            const weekdayCheckboxes = document.querySelectorAll('.weekday');
                            // Replace 'start' and 'end' with the actual class of your time inputs
                            const startInputs = document.querySelectorAll('[name^="start"]');
                            const endInputs = document.querySelectorAll('[name^="end"]');

                            // Listen for changes in the checkbox state
                            weekdayCheckboxes.forEach(checkbox => {
                                checkbox.addEventListener('change', function () {
                                    const index = Array.from(weekdayCheckboxes).indexOf(checkbox);

                                    // Enable or disable the corresponding time inputs based on the checkbox state
                                    startInputs[index].disabled = !checkbox.checked;
                                    endInputs[index].disabled = !checkbox.checked;
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>

</div>
