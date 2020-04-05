<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsCrudController extends Controller
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
        return view('admin.newsCrud')->with('news', \DB::table('news')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
//        Check if request method is POST
        if($request->isMethod('post')) {
            $url = null;
            if ($request->file('image')) {
                $path = \Storage::putFile('/img', $request->file('image'));
                $url = \Storage::url($path);
            }

//          Store session data to pass back in form in case of some error
            $request->flash();

            $record = $request->except('_token'); // Receive data except _token
            $record['image'] = '/' . $path;

            $id = \DB::table('news')->insertGetId($record);

            if($id){
                return redirect(route('news.show', ['id' => $id]))
                                ->with('success', 'News successfully created!');; // if record was added it open recent added news to see it
            } else {
                // if record was not added it come back to form with error message
                return redirect(route('admin.newsCrud.create'))->with('error',  'Cannot add News! :(');
            }
        }
        // return view when enter first time
        return view('admin.newsCreate', ['categories' => \DB::table('categories')->get()]
        );
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
        return News::storeNews($record);
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
