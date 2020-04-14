<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::query()->select(['id', 'name', 'slug'])->get();
        return view('news.categories')->with('categories', $categories);
    }

    public function show($slug) {
//
//        $category = [];
//        $news = [];
//        // Check if table exists
//        if (\Schema::hasTable('categories')) {
//            $category = \DB::table('categories')->get()->where('slug', $slug)->first();
//        }
////         Check if table exists
//        if (\Schema::hasTable('news')) {
//            $news = \DB::table('news')->get()->where('category_id', $category->id);
//        }
//        if (!empty($category)) {
//            return view('news.category')
//                ->with('category', $category->name)
//                ->with('news', $news);
//        } else {
//            return redirect()->route('news.category.index');
//        }
        $category = Category::query()->select(['id', 'name'])->where('slug', $slug)->first();
//        $category->has('category_id')
//        $news = new News;
//        $news->category();
//        $news->
//            ->where('category_id', $category->id);
//        dd(Category::query()->find(1)->news()->get());
        $news = Category::find($category->id)->news;
//        dd($news);
        return view('news.category')->with('news', $news)->with('category', $category->name);

    }
}
