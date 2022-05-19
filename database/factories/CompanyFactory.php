<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    private static $id = 0;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // array of logos image file names to seed the database with.
        $logos = ['company-logo-1.png', 'company-logo-2.png',
          'company-logo-3.png', 'company-logo-4.png', 'company-logo-5.png',
          'company-logo-6.png', 'company-logo-7.png', 'company-logo-8.png',
          'company-logo-9.png', 'company-logo-10.png'
        ];

        // $path was created to change the pathing for the img url if necessary.
        $path = '/storage/img/';

        // alternative method to create a path to a random logos which doesn't
        // require an array: array method chosen due to flexibility of path
        // names: 'logos' => $path . 'companies-logos-' .
        // $this->faker->unique()->randomDigit . '.png',

        return [
            'logos' => $path . $logos[self::$id++],
            'name' => $this->faker->company,
            'email'=> $this->faker->email,
            'website'=> $this->faker->domainName
        ];
    }
}
