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
        factory(App\Models\OnCampusRoom::class, 30)->create()->each(
            function ($onCampusRoom) {
                $courseId = App\Models\Course::inRandomOrder()->first()->id;

                App\Models\OnCampusRoomAllowedCourses::create(
                    [
                        'on_campus_room_id' => $onCampusRoom->id,
                        'course_id' => $courseId
                    ]
                );
            }
        );
        factory(App\Models\UserType::class, 1)->create();

        // $this->call(UsersTableSeeder::class);
    }
}
