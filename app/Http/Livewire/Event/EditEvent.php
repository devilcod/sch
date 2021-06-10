<?php

namespace App\Http\Livewire\Event;

use LivewireUI\Modal\ModalComponent;
use App\Models\Event;
use App\Http\Livewire\Event\Events;

class EditEvent extends ModalComponent
{
    public $title;
    public $description;
    public $scheduled_at;
    public $event;

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'scheduled_at' => 'required',
    ];
    public function mount(Event $event)
    {
        $this->event = $event;
        $this->title = $event->title;
        $this->description = $event->description;
        $this->scheduled_at = $event->scheduled_at;
    }

    public static function modalMaxWidth(): string
    {
        return 'sm';
    }

    public function render()
    {
        return view('livewire.event.edit-event');
    }

    public function updateEvent()
    {
        $data = $this->validate();
        $this->event->update($data);
        $this->reset();
        $this->closeModalWithEvents(['eventsUpdated',
        Events::getName() => 'eventsUpdated',]);
    }

    public function deleteEvent()
    {
        $this->event->delete();
        $this->closeModalWithEvents(['eventsUpdated',
        Events::getName() => 'eventsUpdated',]);
    }

}
