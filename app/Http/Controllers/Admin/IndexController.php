<?php

namespace App\Http\Controllers\Admin;

use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        return view('admin.index');
    }

    public function downloadImage() {
        return response()->download('img/1051789-1080p-nature-wallpaper-1920x1080-ios.jpg');
    }

    public function downloadJson() {
        return response()->json(News::getNews())
                    ->header('Content-Disposition', 'attachment; filename = "json.txt"')
                    ->setEncodingOptions(JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
    }

    public static function addRecordToJsonFile ($file, $record)
    {
        $fileContent = [];
        if(!\File::exists($file)) {
            $id = 1;
        } else {
            $fileContent = json_decode(\File::get($file), true);
            $id = max(array_keys($fileContent)) + 1;
        }
        $record += ['id' => $id];
        $fileContent += [$id => $record];
        \File::put($file, json_encode($fileContent));

        return $id;
    }
}
