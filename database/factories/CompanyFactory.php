<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // array of logo image file names to seed the database with.
        $logos = ['company-logo-1.png', 'company-logo-2.png', 'company-logo-3.png',
            'company-logo-4.png', 'company-logo-5.png', 'company-logo-6.png', 'company-logo-7.png',
            'company-logo-8.png', 'company-logo-9.png', 'company-logo-10.png'
        ];

        // $path was created to change the pathing for the img url if necessary.
        $path = '/storage/img/';

        // alternative method to create a path to a random logo which doesn't require an array:
        // array method chosen due to flexibility of path names.
        // 'logo' => $path . 'companies-logo-' . $this->faker->unique()->randomDigit . '.png',

        return [
            'name' => $this->faker->company,
            'email'=> $this->faker->email,
            // randomDigit will only work for 10 or fewer objects, use randomNumber(i) if companies supersede 10.
            'logo' => $path . $logos[$this->faker->unique()->randomDigit],
            'website'=> $this->faker->domainName
        ];
    }
}
