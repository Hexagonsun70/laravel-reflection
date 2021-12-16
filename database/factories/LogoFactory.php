<?php

namespace Database\Factories;


use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class LogoFactory extends Factory
{

//    private static $company_id = 1;
    private static $logo_index = 0;

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
            // realised that I didn't actually want the images to be associated with a company, as they could be
            // assigned dynamically. logos should just act as  a repo for companies to draw from.
//            'company_id' => self::$company_id++,
            'file_path' => $path . $logos[(self::$logo_index++)],
        ];
    }

}
