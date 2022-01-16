<?php

namespace Database\Factories;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Admin::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Jon Admin',
            'email' => 'admin@mailinator.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Pa$$w0rd!'),
            'remember_token' => Str::random(10),
        ];
    }
}
