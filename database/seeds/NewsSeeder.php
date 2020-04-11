<?php

use Illuminate\Database\Seeder;
use App\Category;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->generateData());
    }

    private function generateData(): array
    {
        $faker = Faker\Factory::create();
        $category_id = Category::query()->count();
        $data = [];
        for ($i = 0; $i <= 25; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(30, 50)),
                'shortText' => $faker->realText(rand(50, 250)),
                'text' => $faker->realText(rand(1500, 4000)),
                'isPrivate' => (bool)rand(0,1),
                'category_id' => rand(1, $category_id),
                'image' => '/img/news' . rand(1,8) .'.jpg',
            ];
        }
        return $data;
    }
}
