<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesCrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.categoriesCrud')->with('categories', Category::getCategories());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        if($request->query()) {
            $request->flash();

            $path = 'storage/';
            $fileName = 'categoriesJson.txt';
            $record = $request->except('_token');
            if($record['slug'] === null){
                $record['slug'] = \Str::slug($record['name']);
            };
            $id = IndexController::addRecordToJsonFile($path.$fileName, $record);
            if($id){
                return redirect(route('news.category.show', ['slug' => Category::getCategorySlugById($id)]));
            } else {
                return redirect(route('admin.categoriesCrud.create'))->with('error',  'Cannot add Categoty! :(');
            }
        }

        return view('admin.categoryCreate',
                        ['categories' => Category::getCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
