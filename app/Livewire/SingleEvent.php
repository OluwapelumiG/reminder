<?php

namespace App\Livewire;

use App\Models\Event;
use Livewire\Component;

class SingleEvent extends Component
{
    public $event;

    public function mount(Event $event)
    {
        $this->event = $event;
    }

    public function render()
    {
        return view('livewire.single-event');
    }
}
