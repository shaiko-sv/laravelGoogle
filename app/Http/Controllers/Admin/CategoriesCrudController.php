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
        return view('admin.categoriesCrud')->with('categories', \DB::table('categories')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function create(Request $request)
    {
        // As GET method is default we check if we have some data
        if($request->query()) {
//            Store session data to pass back in form in case of some error
            $request->flash();

            $record = $request->except('_token'); // Receive data except _token
            if($record['slug'] === null){
                $record['slug'] = \Str::slug($record['name']); // we use helper to generate it
            };

            // Check if category already exists
            foreach (\DB::table('categories')->get() as $item){
                if($item->slug == $record['slug']) {
                    return redirect(route('admin.categoriesCrud.create'))->with('error',  'Category already exists.');
                }
            }
            $id = \DB::table('categories')->insertGetId($record);

                if($id) {
                    return redirect(route('news.category.show', ['slug' => \DB::table('categories')->find($id)->slug]))
                                    ->with('success', 'Category successfully created!');
                } else {
                    return redirect(route('admin.categoriesCrud.create'))->with('error',  'Cannot write data to database.');
                }
        }
        // return view when enter first time
        return view('admin.categoryCreate',
                        ['categories' => \DB::table('categories')->get()]);
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
