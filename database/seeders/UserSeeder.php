<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['name' => 'King',
              'lastName' => 'Poop',
              'age' => 100,
              'password' => bcrypt('kingpoop'),
              'email' => 'kingpoop@gmail.com',
              'role_id' => '1',
            ],
            ['name' => 'Alpha',
              'lastName' => 'Poop',
              'age' => 70,
              'password' => bcrypt('alphapoop'),
              'email' => 'alphapoop@gmail.com',
              'role_id' => '2',
            ],
            ['name' => 'Basic',
              'lastName' => 'Poop',
              'age' => 15,
              'password' => bcrypt('basicpoop'),
              'email' => 'basicpoop@gmail.com',
              'role_id' => '3',
            ],
        ]);
    }
}
