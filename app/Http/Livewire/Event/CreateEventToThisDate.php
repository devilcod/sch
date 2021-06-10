<?php

namespace App\Http\Livewire\Event;

use LivewireUI\Modal\ModalComponent;
use App\Models\Event;
use App\Http\Livewire\Event\Events;

class CreateEventToThisDate extends ModalComponent
{
    public $title;
    public $description;
    public $scheduled_at;
    public $date = '';

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'scheduled_at' => 'required',
    ];
    public function mount($date)
    {
        if($date)
        {
            $this->scheduled_at = $this->date;
        }
    }
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.event.create-event-to-this-date');
    }

    public function setEvent()
    {
        $data = $this->validate();
        Event::create($data);
        $this->reset();
        $this->closeModalWithEvents(['eventsUpdated',
        Events::getName() => 'eventsUpdated',]);
    }

}
