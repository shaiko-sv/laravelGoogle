<?php

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    protected $categories = [
        'Politics',
        'Health',
        'Sport',
        'Religion',
        'Hi-Tech',
        'Military',
        'Children',
        'Nature',
        'Science',
        'Global',
        'Local',
        'Stupid',
        'Coronavirus',
    ];
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert($this->getCategories());
    }

    public function getCategories(): array
    {
        $data = [];
        foreach ($this->categories as $item){
            $data[] = [
                'name' => $item,
                'slug' => \Str::slug($item),
            ];
        }
        return $data;
    }

    public static function getNumberOfCategories()
    {

    }
}
