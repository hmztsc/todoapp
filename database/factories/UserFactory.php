<?php

namespace Database\Factories;

use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
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
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'department_id' => Department::all()->random()->id,
            'is_admin' => false
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }

    public function superAdmin()
    {
        return $this->state([
            'name' => 'Webtures Super Admin',
            'email' => 'superadmin@webtures.com',
            'is_superadmin' => true
        ]);
    }

    public function admin()
    {
        return $this->state([
            'name' => 'Webtures Admin',
            'email' => 'admin@webtures.com',
            'is_admin' => true
        ]);
    }

    public function adminOthers()
    {
        return $this->state([
            'is_admin' => true
        ]);
    }

    public function user()
    {
        return $this->state([
            'name' => 'Webtures User',
            'email' => 'user@webtures.com',
            'is_agent' => true
        ]);
    }
}
