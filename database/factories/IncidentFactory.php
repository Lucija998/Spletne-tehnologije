<?php

namespace Database\Factories;

use App\Models\Incident;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Incident>
 */
class IncidentFactory extends Factory
{
    protected $model = Incident::class;

    public function definition(): array
    {
        return [
            'title' => $this->faker->randomElement([
    'Izpad sistema',
    'Napaka strežnika',
    'Težava z omrežjem',
    'Napaka prijave',
    'Počasno delovanje aplikacije',
]),

'description' => $this->faker->randomElement([
    'Sistem se ne odziva že več minut.',
    'Uporabniki ne morejo dostopati do aplikacije.',
    'Pojavlja se napaka HTTP 500.',
    'Povezava do strežnika je nestabilna.',
    'Uporabniki poročajo o počasnem delovanju.',
]),
            'severity' => $this->faker->randomElement(['nizka', 'srednja', 'visoka']),
            'status' => $this->faker->randomElement(['nov', 'v obdelavi', 'rešen']),
        ];
    }
}
