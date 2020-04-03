<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $path = 'public/';
    private static $fileStorageCategories = 'categoriesJson.txt';

    public static function setCategories()
    {
        $categories = [];
        $pathToFile = static::$path . static::$fileStorageCategories;
        if(\Storage::exists($pathToFile)) {
            $categories = json_decode(\Storage::get($pathToFile), true);
        }
        return $categories;
    }

    public static function getCategories()
    {
        return static::setCategories();
    }

    public static function getCategoryNameById($id)
    {
        $category = static::setCategories()[$id];
        return $category['name'];
    }

    public static function getCategorySlugById($id)
    {
        $category = static::setCategories()[$id];
        return $category['slug'];
    }

    public static function getCategoryIdByName($name)
    {
        $id = null;
        foreach (static::setCategories() as $item) {
            if($item['slug'] == $name) {
                $id = $item['id'];
                break;
            }
        }
        return $id;
    }

    public static function createCategory($record)
    {
        // If slug not informed...
        if($record['slug'] === null){
            $record['slug'] = \Str::slug($record['name']); // we use helper to generate it
        };

        // Add record to Json file and return ID of new record
        return Json::addRecordToJsonFile(static::$path . static::$fileStorageCategories, $record);
    }
}
