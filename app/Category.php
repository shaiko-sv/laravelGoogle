<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $category = [
        'goodnews' => [
            'id' => 1,
            'name' => 'Good News',
            'route' => 'goodnews',
        ],
        'badnews' => [
            'id' => 2,
            'name' => 'Bad News',
            'route' => 'badnews',
        ],
    ];

    public static function getCategory()
    {
        return static::$category;
    }

    public static function getCategoryName($name)
    {
        return static::$category[$name];
    }

    public static function getCategoryId($name)
    {
        return static::$category[$name]['id'];
    }
}
