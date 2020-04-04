<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    private static $fileStorageCategories = 'categoriesJson.txt';

    public static function getCategories()
    {
        $fileName = static::$fileStorageCategories;
        if(\Storage::disk('public')->exists($fileName)) {
            return json_decode(\Storage::disk('public')->get($fileName), true);
        }
        return [];
    }

    public static function getCategoryNameById($id)
    {
        if (array_key_exists($id, self::getCategories())) {
            return self::getCategories()[$id]['name'];
        } else {
            return Null;
        }
    }

    public static function getCategorySlugById($id)
    {
        $category = static::getCategories();
        return $category[$id]['slug'];
    }

    public static function getCategoryIdByName($name)
    {
        $id = null;
        foreach (static::getCategories() as $item) {
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
        // Check if category already exists
        foreach (static::getCategories() as $item){
            if($item['slug'] == $record['slug']) {
                return [false, 'Category already exist.'];
            }
        }
        // Return complete record
        return $record;
    }

    public static function storeCategory($record)
    {
        // Add record to Json file and return ID of new record
        return  Json::addRecordToJsonFile(static::$fileStorageCategories, $record);
    }
}
