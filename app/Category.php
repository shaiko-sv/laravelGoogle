<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $categories = [
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

    public static function getCategories()
    {
        return static::$categories;
    }

    public static function getCategoryNameById($id)
    {
        $category = static::$categories[$id];
        return $category['name'];
    }

    public static function getCategoryIdByName($name)
    {
        $id = null;
        foreach (static::$categories as $item) {
            if($item['route'] == $name) {
                $id = $item['id'];
                break;
            }
        }
        return $id;
    }
}
