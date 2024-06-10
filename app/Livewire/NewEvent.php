<?php

namespace App\Livewire;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewEvent extends Component
{
    public $frequency;
    public $class;
    public $venue;
    public $date;
    public $day = [];
    public $start = [];
    public $end = [];
    public $sStart;
    public $sEnd;

    public $weekdays = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

    public function render()
    {
        return view('livewire.new-event');
    }

    public function save()
    {
//        dd($this);

        $this->validate([
            'class' => 'required|string',
            'venue' => 'required|string',
            'frequency' => 'required|string',
        ]);

        try {
            if ($this->frequency == 'repeated'){
                foreach ($this->day as $rowId => $row){
                    $currDay = $rowId;
                    $currStart = $this->start[$rowId];
                    $currEnd = $this->end[$rowId];

                    Event::create([
                        'user' => Auth::id(),
                        'class' => $this->class,
                        'venue' => $this->venue,
                        'frequency' => $this->frequency,
                        'day' => $currDay,
                        'status' => 1,
                        'start' => $currStart,
                        'end' => $currEnd,
                    ]);
                }
            }
            else{
                Event::create([
                    'user' => Auth::id(),
                    'class' => $this->class,
                    'venue' => $this->venue,
                    'frequency' => $this->frequency,
                    'date' => $this->date,
                    'status' => 1,
                    'start' => $this->sStart,
                    'end' => $this->sEnd,
                ]);
            }
            flash()->addSuccess('Event added successfully.');

            $this->redirect('/');
        } catch (\Exception $e) {
            flash()->addError('Error: ' . $e->getMessage());
        }
    }

    public function updatedFrequency()
    {
        $this->dispatch('frequencyUpdated', $this->frequency);
    }
}
