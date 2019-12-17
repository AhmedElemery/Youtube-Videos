<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class Videos extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $images = [
            '1576136556W7Q8aCqZH2.jpg',
            '1576450658svLYUachWp.jpg',
            '1576450831EjdSbOugVH.jpg',
            '1576494012hU21lBDzNT.jpg',
            '15762687079sa6FYwt0m.png',

        ];
        $youtube = [
            'https://www.youtube.com/watch?v=-qkFm00LE1s',
            'https://www.youtube.com/watch?v=bct1iBLJF7g',
            'https://www.youtube.com/watch?v=uk4Dtgn7SPY',
            'https://www.youtube.com/watch?v=D0xTSzCEMHM',
            'https://www.youtube.com/watch?v=9s4jcxqjNBk',

        ];

        $ids = [1,2,3,4,5,6,7,8,9];

        for($i=0 ; $i< 10 ; $i++)
        {
            $array = [
                'name' => $faker->name,
                'meta_keywords' => $faker->word,
                'meta_desc' => $faker->word,
                'cat_id' => 1,
                'user_id' => 1,
                'youtube' => $youtube[rand(0,4)],
                'published' => rand(0,1),
                'image' => $images[rand(0,3)],
                'desc' => $faker->paragraph,
            ];
            $video = \App\Model\Video::create($array);

            $video->skills()->sync(array_rand($ids , 3));
            $video->tags()->sync(array_rand($ids , 3));
        }
    }
}
