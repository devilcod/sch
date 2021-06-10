<?php

namespace App\Http\Livewire\Calendar;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Livewire\Component;

class CalendarHelper extends Component
{
    public function render()
    {
        return view('livewire.calendar.calendar-helper');
    }
}
