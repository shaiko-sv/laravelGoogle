<?php

namespace App\Http\Controllers\News;

use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
//        $news = [];
        // Check if table exists
//        if (\Schema::hasTable('news')) {
//        $news = \DB::select('SELECT * FROM news');
            // Read news from table
//            $news = \DB::table('news')
//                ->join('categories', 'news.category_id', '=', 'categories.id' )
//                ->select('news.*', 'categories.name as category')
//                ->get();
//        $news = News::all();
        $news = News::query()
//                ->where('isPrivate', false)
                ->paginate(10);

        return view('news.index')->with('news', $news)->with('pagination', true);
    }

    public function show($id)
    {
//        $news = [];
//        if (\Schema::hasTable('news')) {
//            $news = \DB::select('SELECT * FROM news WHERE id = :id', ['id' => $id]);
//            $news = \DB::table('news')->find($id);
//        }
        $news = News::query()->find($id);
        if (!empty($news)) {
            return redirect()->away($news->link);
        } else {
            return redirect()->route('news.index');
        }
    }
}
