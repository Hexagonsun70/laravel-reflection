<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Logo;
use App\Models\Employee;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('uxiQxfG8YK5W2sG')
        ]);

        Company::factory(10)->create();

        Logo::factory(10)->create();

        Employee::factory(100)->create();


//         Company::create([
//             'name' => 'Netmatters',
//             'email' => 'user1@admin.com',
//             'logos' => 'img/companies-logos-1.png',
//             'website' => 'website-url.com'
//         ]);
//
//        Company::create([
//            'name' => 'Company 2',
//            'email' => 'user2@admin.com',
//            'logos' => 'img/companies-logos-2.png',
//            'website' => 'website-url-two.com'
//        ]);
//
//        Company::create([
//            'name' => 'Company 3',
//            'email' => 'user3@admin.com',
//            'logos' => 'img/companies-logos-3.png',
//            'website' => 'website-url-three.com'
//        ]);
    }
}
