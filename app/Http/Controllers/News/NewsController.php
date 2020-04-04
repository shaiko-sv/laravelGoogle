<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {

        return view('news.index')->with('news', News::getNews());
    }

    public function show($id)
    {
        $news = News::getNewsById($id);
        if ($news) {
            return view('news.one')->with('news', News::getNewsById($id));
        } else {
            return redirect()->route('news.index');
        }
    }
}
