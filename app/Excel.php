<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//require 'vendor/autoload.php';

class Excel extends Model
{
    static function getData($table, $filter = [])
    {
//        $filter =
//        return \Schema::getColumnListing($table);
//        return \DB::table($table)->get()->where('isPrivate', true);
//        return \DB::table($table)->whereIn('id', [1, 3, 5, 10])->get()->where('isPrivate', true);
        return \DB::table($table)
                        ->whereDate('created_at', '>', '2020-04-06')
                        ->whereIn('id', [1, 3, 5, 10])
                        ->where('isPrivate', true)
//                        ->whereIn('category_id', [1, 4, 9])
                        ->whereIn('image', ['/img/news2.jpg', '/img/news8.jpg'])
                        ->get();

    }

    static function writeExcel()
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'Hello World !');

        dd(self::getData('news'));

        $writer = new Xlsx($spreadsheet);
        $writer->save('storage/hello world.xlsx');
        return true;
    }
}
