<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Asantibanez\LivewireCalendar\LivewireCalendar;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class AppointmentsCalendar extends LivewireCalendar
{
    public $beforeCalendarView = true;
    public $selection;
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
        $this->emit("openModal", "event.create-event-to-this-date", ["date" => $date]);
    }

    public function onEventClick($eventId)
    {
        $event = Event::find($eventId);
        $this->emit("openModal", "event.edit-event", ["event" => $event]);
    }

    public function onEventDropped($eventId, $year, $month, $day)
    {
        $event = Event::findOrFail($eventId);
        $this->date = "$year-$month-$day";
        $event->update(['scheduled_at' => $this->date]);
    }
    public function goToPreviousMonth()
    {
        $this->startsAt->subMonthNoOverflow();
        $this->endsAt->subMonthNoOverflow();

        $this->calculateGridStartsEnds();
        $this->selection = '';
    }

    public function goToNextMonth()
    {
        $this->startsAt->addMonthNoOverflow();
        $this->endsAt->addMonthNoOverflow();

        $this->calculateGridStartsEnds();
        $this->selection = '';
    }

    public function goToCurrentMonth()
    {
        $this->startsAt = Carbon::today()->startOfMonth()->startOfDay();
        $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();

        $this->calculateGridStartsEnds();
        $this->selection = '';
    }
    public function findByDate()
    {
       $this->startsAt = Carbon::createFromDate($this->selection)->startOfMonth()->startOfDay();
       $this->endsAt = $this->startsAt->clone()->endOfMonth()->startOfDay();
       $this->calculateGridStartsEnds();
    }
}
