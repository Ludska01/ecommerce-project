<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SiteSettingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'logo'=>'default',
            'phone_one'=>'default',
            'phone_two'=>'default',
            'email'=>'default',
            'company_name' =>'default',
            'company_address'=>'default',
            'facebook'=>'default',
            'twitter'=>'default',
            'linkedin'=>'default',
            'youtube'=>'default',
          
        ];
    }
}
