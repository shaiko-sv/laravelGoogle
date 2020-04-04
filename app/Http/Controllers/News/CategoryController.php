<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        return view('category')->with('category', Category::getCategory());
    }

    public function show($name) {
        return view('categoryOne')
            ->with('category', Category::getCategoryId($name))
        ->with('news', News::getNewsByCategory($name));
    }
}
