<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class AdminSeeder extends Seeder
{
    protected $faker;

    public function __construct(Faker $faker)
    {
        $this->faker = $faker;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $accountType = App\Models\UserType::where('name', 'admin')->first();

        if (is_null($accountType)) {
            $this->call(UserTypeSeeder::class);
        }

        $faker = $this->faker;

        try {
            factory(App\Models\User::class, 1)
                ->create(
                    [
                        'user_type_id' => $accountType,
                        'email' => 'admin@gmail.com'
                    ]
                )
                ->each(
                    function ($user) use (&$faker) {
                        DB::table('admins')->insert(
                            [
                                'user_id' => $user->id,
                                'firstname' => $faker->firstName,
                                'lastname' => $faker->lastName
                            ]
                        );
                    }
                );
        } catch (\Exception $ex) {
            // User already exists
        }

        echo "Successfully executed AdminSeeder\n";
    }
}