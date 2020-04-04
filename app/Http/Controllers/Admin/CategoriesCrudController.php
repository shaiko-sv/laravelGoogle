<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesCrudController extends Controller
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
        // As GET method is default we check if we have some data
        if($request->query()) {
//            Store session data to pass back in form in case of some error
            $request->flash();

            $record = $request->except('_token'); // Receive data except _token

            $record = Category::createCategory($record);

            if($record && ($record[0] != false)){
                // if record was created let's store it
                $id = $this->store($record);
                if($id) {
                    return redirect(route('news.category.show', ['slug' => Category::getCategorySlugById($id)]));
                } else {
                    return redirect(route('admin.categoriesCrud.create'))->with('error',  'Cannot write data to file.');
                }
            } else {
                // if record was not added it come back to form with error message
                return redirect(route('admin.categoriesCrud.create'))->with('error',  $record[1]);
            }
        }
        // return view when enter first time
        return view('admin.categoryCreate',
                        ['categories' => Category::getCategories()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param $record array
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($record = [], Request $request = null)
    {
       return Category::storeCategory($record);
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
