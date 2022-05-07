<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SeoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'meta_title'=> 'default',
            'meta_author'=> 'default',
            'meta_keyword'=> 'default',
            'meta_description'=> 'default',
            'google_analytics'=> 'default',
        ];
    }
}
