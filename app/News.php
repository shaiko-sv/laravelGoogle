<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    private static $path = 'public/';
    private static $fileStorageNews = 'newsJson.txt';

    public static function setNews()
    {
        $news = [];
        $pathToFile = self::$path.self::$fileStorageNews;
        if(\Storage::exists($pathToFile)) {
            $news = json_decode(\Storage::get($pathToFile), true);
        }
        return $news;
    }

    public static function getNews()
    {
        return self::setNews();
    }

    public static function getNewsId($id)
    {
        if (array_key_exists($id, self::setNews())) {
            return self::setNews()[$id];
        } else {
            return Null;
        }
    }

    public static function getNewsByCategoryName($name)
    {
        $news = [];
        $id = Category::getCategoryIdByName($name);
        foreach (self::setNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }
}
