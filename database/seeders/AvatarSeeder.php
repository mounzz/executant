<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AvatarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('avatars')->insert([
            ['name' => 'default',
              'url' => 'default.png'],
            ['name' => 'Breath of the wild link',
              'url' => 'botwLink.png'],
            ['name' => 'Breath of the wild Zelda',
              'url' => 'botwzelda.png'],
            ['name' => 'Young Link',
              'url' => 'younglink.png'],
            ['name' => 'Skyward Sword Zelda',
              'url' => 'sszelda.png'],
        ]);
    }
}
