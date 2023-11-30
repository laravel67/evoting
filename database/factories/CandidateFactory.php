<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Candidate>
 */
class CandidateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $gender = $this->faker->randomElement(['Putri', 'Putra']);
        return [
            'nisn_ketua' => $this->faker->unique()->numerify('##########'),
            'nisn_wakil' => $this->faker->unique()->numerify('##########'),
            'name_ketua' => $this->faker->name,
            'name_wakil' => $this->faker->name,
            'image' => null, // You may modify this based on your needs
            'visi_misi' => $this->faker->text,
            'priode_id' => 1, // You may modify this based on your needs
            'votes' => 0,
            'gender' => $gender,
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
