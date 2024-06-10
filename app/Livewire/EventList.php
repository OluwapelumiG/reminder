<?php

namespace App\Livewire;

use App\Models\Event;
use Carbon\Carbon;
use Livewire\Component;

class EventList extends Component
{

    public $dateRange;
    public $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];
    public $events;
    public $day;
    public $date;
    public $week;

    public $currentDay;

    private function getWeekDateRange($currentDate)
    {
        $startOfWeek = $currentDate->startOfWeek();
        $dates = [];

        foreach ($this->days as $day) {
            $dates[$day] = Carbon::parse($startOfWeek->format("Y-m-d"))->modify("this $day")->format("Y-m-d");
        }

        return $dates;
    }

    public function mount($week = null)
    {
        $this->currentDay = Carbon::now();
        $this->week = $this->currentDay->copy()->weekOfYear;
        if ($week) {
            $weekDifference = $this->week - $week;

            if ($weekDifference > 0) {
                $this->currentDay->subWeeks($weekDifference);
            } elseif ($weekDifference < 0) {
                $this->currentDay->addWeeks(abs($weekDifference));
            }
            $this->week = $week;
        }
        $this->date = ($this->currentDay->isCurrentDay()) ? $this->currentDay->format("Y-m-d") : '';
        $this->dateRange = $this->getWeekDateRange($this->currentDay);

    }

    public function render()
    {
//        $this->events = Event::where('date', $this->date)->get();
        $this->events = Event::where(function ($query) {
            // Select events where frequency is 'repeat' and day matches the day of the week
            $query->where('frequency', 'repeated')
                ->where('day', \Carbon\Carbon::parse($this->date)->format('l'));
        })
            ->orWhere('date', $this->date)
            ->orderBy('start') // Order by the 'start' time
            ->get();
        return view('livewire.event-list');
    }

    public function selectDate($date)
    {
        $this->date = $date;
        $this->day = $date;
        $this->render();
    }

//    public function nextWeek()
//    {
//        $this->currentDay = $this->currentDay->addWeek()->startOfWeek();
//        $this->dateRange = $this->getWeekDateRange($this->currentDay);
//
//        flash()->addSuccess('Next week.');
//
//        $this->dispatch('updateEvent')->self();
//
////        return view('livewire.event-list');
//    }
//
//    public function prevWeek()
//    {
//        $this->currentDay = $this->currentDay->subWeek()->startOfWeek();
//        $this->dateRange = $this->getWeekDateRange($this->currentDay);
//
//        flash()->addSuccess('Previous week.');
//
//        $this->dispatch('updateEvent')->self();
//
////        return view('livewire.event-list');
//    }

//    public function getEvent()
//    {
//        $this->day;
//        $this->date;
//    }

}
