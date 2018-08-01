<?php

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
        factory(App\Models\OffCampusRoom::class, 30)->create();
        factory(App\Models\OnCampusRoom::class, 30)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
