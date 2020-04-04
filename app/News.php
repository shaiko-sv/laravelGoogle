<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 */
class News extends Model
{
    private static $fileStorageNews = 'news.json';

    /**
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNews()
    {
        $fileName = static::$fileStorageNews;
        if(\Storage::disk('public')->exists($fileName)) {
            return json_decode(\Storage::disk('public')->get($fileName), true);
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
        if (array_key_exists($id, self::getNews())) {
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
        if(!array_key_exists('isPrivate',$record)){ // Check if not exist key isPrivate, due to unchecked in form it's not added to data
            $record += ['isPrivate' => 0];              // add this key to data with value 0
        };

        // Return complete record
        return $record;
    }

    public static function storeNews($record)
    {
        // Add record to Json file and return ID of new record
        return  Json::addRecordToJsonFile(static::$fileStorageNews, $record);
    }
}
