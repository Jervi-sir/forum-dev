<?php

namespace Database\Seeders;

use Database\Seeders\TagSeeder;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\FieldSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $role = new RoleSeeder();
        $field = new FieldSeeder();
        $tag = new TagSeeder();

        $role->run();
        $field->run();
        $tag->run();
    }
}
