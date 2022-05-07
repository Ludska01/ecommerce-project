<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdminFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'brand' => 1,
            'category' => 1,
            'product' => 1,
            'slider' => 1,
            'coupons' => 1,

            'shipping' => 1,
            'blog' => 1,
            'setting' => 1,
            'returnorder' => 1,
            'review' => 1,

            'orders' => 1,
            'stock' => 1,
            'reports' => 1,
            'alluser' => 1,
            'adminuserrole' => 1,
            'type' => 2,
        ];
    }
}
