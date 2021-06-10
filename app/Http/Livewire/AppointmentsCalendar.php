<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Livewire;

class AppointmentsCalendar extends LivewireCalendar
{
    // public string $date;
    public $listeners = ['eventsUpdated' => 'events'];

    public function events(): Collection
    {
        return Event::query()
        ->whereDate('scheduled_at', '>=', $this->gridStartsAt)
        ->whereDate('scheduled_at', '<=', $this->gridEndsAt)
        ->get()
        ->map(function (Event $model) {
            return [
                'id' => $model->id,
                'title' => $model->title,
                'description' => $model->description,
                'date' => $model->scheduled_at,
            ];
        });
    }

    public function onDayClick($year, $month, $day)
    {
        $date = "$year-$month-$day";
        $this->emit("openModal", "event.create-event", ["date" => $date]);
    }

    public function onEventClick($eventId)
    {
        $event = Event::find($eventId);
        $this->emit("openModal", "event.edit-event", ["event" => $event]);
    }

    public function onEventDropped($eventId, $year, $month, $day)
    {
        $event = Event::find($eventId);
        $this->date = "$year-$month-$day";
        $event->update(['scheduled_at' => $this->date]);
    }
}
