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
//                        ->whereDate('created_at', '>', '2020-04-06')
                        ->whereIn('id', [1, 3, 5, 10])
//                        ->where('isPrivate', true)
//                        ->whereIn('category_id', [1, 4, 9])
//                        ->whereIn('image', ['/img/news2.jpg', '/img/news8.jpg'])
                        ->get();

    }

    static function writeExcel($fileName)
    {
        $columnNames = [
            'A' => ['Title', 'title'],
            'B' => ['Text', 'text'],
            'C' => ['Private', 'isPrivate'],
            'D' => ['Created', 'created_at'],
        ];
        $data = self::getData('news');
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        foreach ($columnNames as $key => $column) {
            $row = 1;
            $cell = $key . $row;
            $sheet->setCellValue($key . $row, $column[0]);
            $columnName = $column[1];
            foreach ($data as $item) {
                $row++;
                $sheet->setCellValue($key . $row, $item->$columnName);
            }
        }
        $writer = new Xlsx($spreadsheet);
        $writer->save('storage/'.$fileName.'.xlsx');
        return true;
    }
}
