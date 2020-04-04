<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category = [
        1 => [
            'id' => 1,
            'name' => 'Coronavirus',
            'route' => 'coronavirus',
        ],
        2 => [
            'id' => 2,
            'name' => 'Technology',
            'route' => 'technology',
        ],
    ];

    public static function getCategory()
    {
        return static::$category;
    }

    public static function getCategoryByName($name)
    {
        $category = static::getCategoryId($name);
        return static::$category[$category['id']];
    }

    public static function getCategoryId($name)
    {
        foreach (static::$category as $item) {
            if($item['route'] == $name) {
                return $item;
            }
        }
    }
}
