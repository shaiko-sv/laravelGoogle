<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = [];
        // Check if table exists
        if (\Schema::hasTable('news')) {
//        $news = \DB::select('SELECT * FROM news');
            // Read news from table
            $news = \DB::table('news')->get();
        }

        return view('news.index')->with('news', $news);
    }

    public function show($id)
    {
        $news = [];
        if (\Schema::hasTable('news')) {
//            $news = \DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
            $news = \DB::table('news')->find($id);
        }
        if (!empty($news)) {
            return view('news.one')->with('news', $news);
        } else {
            return redirect()->route('news.index');
        }
    }
}
