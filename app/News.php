<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $news = [
        1 => [
            'id' => 1,
            'title' => 'News 1',
            'text' => 'We have News 1 and it is very good!',
            'category_id' => 1
        ],
        2 => [
            'id' => 2,
            'title' => 'News 2',
            'text' => 'Here we have bad news(((',
            'category_id' => 2,
        ],
    ];

    public static function getNews()
    {
        return static::$news;
    }

    public static function getNewsId($id)
    {
        return static::$news[$id];
    }

    public static function getNewsByCategory($categoryName)
    {
        $newsByCategory = [];
        $categoryId = Category::getCategoryId($categoryName);
        foreach (static::$news as $item) {
            if ($item['category_id'] == $categoryId) {
                array_push($newsByCategory, $item);
            }
        }
        return $newsByCategory;
    }
}
