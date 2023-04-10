<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition(): array
    {
        return [
            'fname' => fake()->firstName(),
            'lname' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'tel' => $this->fakePhoneNumber(),
            'address' => fake()->city().' '.fake()->streetName(),
            'email_verified_at' => now(),
            'password' => Hash::make('123456789'),
            'slug' => Str::slug(fake()->firstName().' '.fake()->lastName()),
            'remember_token' => Str::random(10),
        ];
    }

    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    private function fakePhoneNumber()
    {
        $tel = str_replace(['+', '-', '.', ')', '(', ' '], '', fake()->phoneNumber());
        if (strlen($tel) > 10) {
            $tel = substr($tel, 0, 10);
        }

        return $tel;
    }
}
