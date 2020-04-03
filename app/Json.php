<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Json extends Model
{
    /**
     * @param $file string - file name with path: path/to/filename.ext
     * @param $record array - array to be added
     * @return int|mixed - index of added record
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public static function addRecordToJsonFile ($file, $record)
    {
        $fileContent = []; // create empty file content

        if(!\Storage::exists($file)) { // check if file not exist
            $id = 1;
        } else {
            $fileContent = json_decode(\Storage::get($file), true); // Get file and decode from json to array
            $id = max(array_keys($fileContent)) + 1; // Get highest id value + 1
        }

        $record += ['id' => $id]; // Add to record key 'id'
        $fileContent += [$id => $record]; // Add complete record to fileContent

        \Storage::put($file, json_encode($fileContent, JSON_PRETTY_PRINT)); //Save file in json format

        return $id; // return id of new added record
    }
}
