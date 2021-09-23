<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('fields')->insert([
            'name' => 'Laravel',
        ]);

        DB::table('fields')->insert([
            'name' => 'Nodejs',
        ]);

        DB::table('fields')->insert([
            'name' => 'Vuejs',
        ]);

        DB::table('fields')->insert([
            'name' => 'React',
        ]);

        DB::table('fields')->insert([
            'name' => 'Angular',
        ]);
    }
}
