<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 */
class News extends Model
{

    /**
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNews()
    {
        if(true) {
            return [];
        }
        return [];
    }

    /**
     * @param $id int
     * @return mixed|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNewsById($id)
    {
        if (false) {
            return self::getNews()[$id];
        } else {
            return Null;
        }
    }

    /**
     * @param $name string
     * @return array
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNewsByCategoryName($name)
    {
        $news = [];
        $id = Category::getCategoryIdByName($name);
        foreach (self::getNews() as $item) {
            if ($item['category_id'] == $id) {
                $news[] = $item;
            }
        }
        return $news;
    }

    public static function createNews($record)
    {
        // Return complete record
        return $record;
    }

    public static function storeNews($record)
    {
        // Add record to Json file and return ID of new record
        return  $record;
    }
}
