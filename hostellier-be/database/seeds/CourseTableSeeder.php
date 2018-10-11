<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CourseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('courses')->insert(
            [
                ['name' => 'computer science'],
                ['name' => 'english'],
                ['name' => 'accounting & finance'],
                ['name' => 'aeronautical & manufacturing engineering'],
                ['name' => 'agriculture & forestry'],
                ['name' => 'american studies'],
                ['name' => 'anatomy & physiology'],
                ['name' => 'anthropology'],
                ['name' => 'archaeology'],
                ['name' => 'architecture'],
                ['name' => 'art & design'],
                ['name' => 'aural & oral sciences'],
                ['name' => 'biological sciences'],
                ['name' => 'building'],
                ['name' => 'business & management studies'],
                ['name' => 'celtic studies'],
                ['name' => 'chemical engineering'],
                ['name' => 'chemistry'],
                ['name' => 'civil engineering'],
                ['name' => 'classics & ancient history'],
                ['name' => 'communication & media studies'],
                ['name' => 'complementary medicine'],
                ['name' => 'computer science'],
                ['name' => 'counselling'],
                ['name' => 'creative writing'],
                ['name' => 'criminology'],
                ['name' => 'dentistry'],
                ['name' => 'drama, dance & cinematics'],
                ['name' => 'east & south asian studies'],
                ['name' => 'economics'],
                ['name' => 'education'],
                ['name' => 'electrical & electronic engineering'],
                ['name' => 'english'],
                ['name' => 'fashion'],
                ['name' => 'film making'],
                ['name' => 'food science'],
                ['name' => 'forensic science'],
                ['name' => 'french'],
                ['name' => 'geography & environmental sciences'],
                ['name' => 'geology'],
                ['name' => 'general engineering'],
                ['name' => 'german'],
                ['name' => 'history'],
                ['name' => 'history of art, architecture & design'],
                ['name' => 'hospitality, leisure, recreation & tourism'],
                ['name' => 'iberian languages/hispanic studies'],
                ['name' => 'italian'],
                ['name' => 'land & property management'],
                ['name' => 'law'],
                ['name' => 'librarianship & information management'],
                ['name' => 'linguistics'],
                ['name' => 'marketing'],
                ['name' => 'materials technology'],
                ['name' => 'mathematics'],
                ['name' => 'mechanical engineering'],
                ['name' => 'medical technology'],
                ['name' => 'medicine'],
                ['name' => 'middle eastern & african studies'],
                ['name' => 'music'],
                ['name' => 'nursing'],
                ['name' => 'occupational therapy'],
                ['name' => 'optometry, ophthalmology & orthoptics'],
                ['name' => 'pharmacology & pharmacy'],
                ['name' => 'philosophy'],
                ['name' => 'physics and astronomy'],
                ['name' => 'physiotherapy'],
                ['name' => 'politics'],
                ['name' => 'psychology'],
                ['name' => 'robotics'],
                ['name' => 'russian & east european languages'],
                ['name' => 'social policy'],
                ['name' => 'social work'],
                ['name' => 'sociology'],
                ['name' => 'sports science'],
                ['name' => 'theology & religious studies'],
                ['name' => 'town & country planning and landscape design'],
                ['name' => 'veterinary medicine'],
                ['name' => 'youth work'],
            ]
        );
    }
}
