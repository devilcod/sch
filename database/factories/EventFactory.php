<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Carbon\CarbonPeriod;

class EventFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Event::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    { $date = Carbon::today()->subDays(rand(0, 20));;
        return [
            'title' => Str::random(5),
            'description' => Str::random(5),
            'scheduled_at' => $date,
        ];
    }
}
