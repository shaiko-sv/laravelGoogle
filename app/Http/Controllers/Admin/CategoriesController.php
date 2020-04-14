<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\News;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;

class CategoriesController extends Controller
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
        $categories = Category::query()->select(['id', 'name', 'slug'])->paginate(10);
        return view('admin.categories')->with('categories', $categories)->with('pagination', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function create(Request $request)
    {
        $category = New Category();
        // As GET method is default we check if we have some data

        if($request->query()) {
//          Store session data to pass back in form in case of some error
            $request->flash();

            // Check if category already exists
            $data = $request->all();
            if($data['slug'] === null){
                $data['slug'] = \Str::slug($data['name']); // we use helper to generate it
            };

            if(in_array($data['slug'], Category::pluck('slug')->toArray())){
                return redirect(route('admin.categories.create'))
                    ->with('error',  'Category already exists.');
            }
            $category->fill($data)->save();

            return redirect(route('admin.categories.index',
                ['slug' => $category->getAttributeValue('slug')]))
                ->with('success', 'Category successfully created!');
            // if record doesn't write
            return redirect(route('admin.categories.create'))
                ->with('error',  'Cannot write data to database.');
        }
        // return view when enter first time
        return view('admin.categoryCreate',
            ['category' => $category]);
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
     * @param  string  $name
     * @return Response
     */
    public function show($name)
    {
        $category = Category::query()->select(['id', 'name'])->where('slug', $name)->get();
        $news = News::query()
            ->where('category_id', $category[0]->id);
        return view('news.category')->with('news', $news);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function edit(Request $request, Category $category)
    {
        return view('admin.categoryCreate', ['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Category $category
     * @return Response
     */
    public function update(Request $request, Category $category)
    {
        if ($request->isMethod('put')){
            $category->fill($request->all())->save();
        }
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Category $category
     * @return Response
     * @throws Exception
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')
            ->with('success', 'Category successfully deleted!');
    }
}
