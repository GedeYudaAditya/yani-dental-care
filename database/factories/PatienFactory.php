<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PatienFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'slug' => $this->faker->slug(),
            'ttl' => $this->faker->date(),
            'alamat_rumah' => $this->faker->address(),
            'alamat_kantor' => $this->faker->address(),
            'no_hp' => $this->faker->phoneNumber(),
            'jenis_kelamin' => $this->faker->randomElement(['laki-laki', 'perempuan']),
            'pekerjaan' => $this->faker->jobTitle(),
        ];
    }
}
