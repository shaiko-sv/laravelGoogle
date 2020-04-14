<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Exception;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Storage;
use Illuminate\Http\Response;

class NewsController extends Controller
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
     * @return Response
     */
    public function index()
    {
        $news = News::query()
            ->paginate(5);

        return view('admin.news')->with('news', $news)->with('pagination', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return Response
     */
    public function create(Request $request)
    {
        $news = new News();

//        Check if request method is POST
        if($request->isMethod('post')) {
            $url = null;
            if ($request->file('image')) {
                $path = \Storage::putFile('/img', $request->file('image'));
                $url = \Storage::url($path);
            }

//          Store session data to pass back in form in case of some error
            $request->flash();

            $news->fill($request->all())->save();

//            if($id){
                return redirect(route('admin.news.index'))
                                ->with('success', 'News successfully created!'); // if record was added it open recent added news to see it
//            } else {
                // if record was not added it come back to form with error message
//                return redirect(route('admin.newsCrud.create'))->with('error',  'Cannot add News! :(');
//            }
        }
        // return view when enter first time
        return view('admin.newsCreate', ['news' => $news, 'categories' => Category::query()->select(['id', 'name'])->get(),]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request = null)
    {
        return 'store';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @param Request $request
     * @param News $news
     * @return Response
     */
    public function edit(Request $request, News $news)
    {
        return view('admin.newsCreate', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param News $news
     * @return void
     */
    public function update(Request $request, News $news)
    {
        //        Check if request method is PUT
        if ($request->isMethod('put')) {
            if ($request->file('image')) {
                $path = \Storage::putFile('/img', $request->file('image'));
                $url = \Storage::url($path);
                $news->image = $url;
            }
            $news->fill($request->all());
            $news->save();
            return redirect()->route('admin.news.index')
                ->with('success', 'News successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param News $news
     * @return void
     * @throws Exception
     */
    public function destroy(News $news)
    {
        $news->delete();
        return redirect()->route('admin.news.index')
            ->with('success', 'News successfully deleted!');
    }
}
