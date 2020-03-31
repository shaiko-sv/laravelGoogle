<?php

namespace App\Http\Controllers\News;

use App\Category;
use App\News;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {

        return view('news.categories')->with('category', Category::getCategories());
    }

    public function show($name) {
        $id = Category::getCategoryIdByName($name);
        if ($id) {
            return view('news.category')
                ->with('category', Category::getCategoryNameById($id))
                ->with('news', News::getNewsByCategoryName($name));
        } else {
            return redirect()->route('news.category.index');
        }

    }
}
