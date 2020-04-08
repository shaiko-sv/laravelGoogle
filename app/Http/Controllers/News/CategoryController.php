<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = [];
        // Check if table exists
        if (\Schema::hasTable('categories')) {
            $categories = \DB::table('categories')->get();
        }
        return view('news.categories')->with('category', $categories);
    }

    public function show($slug) {
//
        $category = [];
        $news = [];
        // Check if table exists
        if (\Schema::hasTable('categories')) {
            $category = \DB::table('categories')->get()->where('slug', $slug)->first();
        }
//         Check if table exists
        if (\Schema::hasTable('news')) {
            $news = \DB::table('news')->get()->where('category_id', $category->id);
        }
        if (!empty($category)) {
            return view('news.category')
                ->with('category', $category->name)
                ->with('news', $news);
        } else {
            return redirect()->route('news.category.index');
        }

    }
}
