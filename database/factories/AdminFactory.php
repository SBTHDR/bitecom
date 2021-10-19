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
            'name' => 'Knight King',
            'email' => 'knightkingadmin@winterfell.com',
            'email_verified_at' => now(),
            'password' => bcrypt('passw0rd'),
            'remember_token' => Str::random(10),
        ];
    }
}
