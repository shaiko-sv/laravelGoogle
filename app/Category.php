<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    public static function getCategories()
    {
        if(true) {
            return [];
        }
        return [];
    }

    public static function getCategoryNameById($id)
    {
        if (false) {
            return self::getCategories()[$id]['name'];
        } else {
            return Null;
        }
    }

    public static function getCategorySlugById($id)
    {
        $categories = static::getCategories();
        return $categories[$id]['slug'];
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
        return  $record;
    }
}
