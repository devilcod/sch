<?php

namespace App\Http\Livewire\Event;

use LivewireUI\Modal\ModalComponent;
use App\Models\Event;
use App\Http\Livewire\Event\Events;

class CreateEvent extends ModalComponent
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
    
    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.event.create-event');
    }

    public function addEvent()
    {
        $data = $this->validate();
        Event::create($data);
        $this->reset();
        $this->closeModalWithEvents(['eventsUpdated',
        Events::getName() => 'eventsUpdated',]);
    }

}
