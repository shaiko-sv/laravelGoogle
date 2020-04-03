<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class News
 * @package App
 */
class News extends Model
{
    private static $path = 'public/';
    private static $fileStorageNews = 'newsJson.txt';

    /**
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function setNews()
    {
        $news = [];
        $pathToFile = self::$path.self::$fileStorageNews;
        if(\Storage::exists($pathToFile)) {
            $news = json_decode(\Storage::get($pathToFile), true);
        }
        return $news;
    }

    /**
     * @return array|mixed
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNews()
    {
        return self::setNews();
    }

    /**
     * @param $id int
     * @return mixed|null
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function getNewsId($id)
    {
        if (array_key_exists($id, self::setNews())) {
            return self::setNews()[$id];
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
        foreach (self::setNews() as $item) {
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

        // Add record to Json file and return ID of new record
        return Json::addRecordToJsonFile(static::$path . static::$fileStorageNews, $record);
    }
}
