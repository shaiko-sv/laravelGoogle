<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Requests\StoreNews;
use App\Http\Requests\UpdateNews;
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
            ->paginate(10);

        return view('admin.news')
                    ->with('news', $news);
//                    ->with('pagination', true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $news = new News();

        return view('admin.newsForm',
                ['news' => $news, 'categories' => Category::query()
                    ->select(['id', 'name'])->get()]);
    }

    /**
     * @param News $news
     * @param StoreNews $request
     * @return Response
     */
    public function store(News $news, StoreNews $request)
    {
        $attribute = 'image'; // attribute of input field from Form

        $validated = $request->validated();

        if($validated){
            if($file = $this->getFilePath($attribute, '/img', $request)){
                $news->fill($request->all())
                    ->setAttribute('image', '/' . $file['path'])
                    ->save();
            } else {
                $news->fill($request->all())
                    ->save();
            };
            return redirect(route('admin.news.index'))
                ->with('success', 'News successfully created!'); // if record was added it open news CRUD page
        } else {
            // if record was not added it come back to form with error message
            // Store session data to pass back in form in case of some error
            $request->flash();
            return redirect(route('admin.news.create'))
                ->with('error',  'Cannot create News! :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $news = News::query()->find($id);
        if (!empty($news)) {
            return view('news.one')->with('news', $news);
        } else {
            return redirect()->route('news.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param News $news
     * @return Response
     */
    public function edit(News $news)
    {
        return view('admin.newsForm', [
            'news' => $news,
            'categories' => Category::query()->select(['id', 'name'])->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateNews $request
     * @param News $news
     * @return void
     */
    public function update(News $news, UpdateNews $request)
    {
        //        Check if request method is PUT
        if ($request->isMethod('put')) {

            $attribute = 'image'; // attribute of input field from Form

            $validated = $request->validated();

            if($validated){
                if($file = $this->getFilePath($attribute, '/img', $request)){
                $news->fill($request->all())
                    ->setAttribute('image', '/' . $file['path'])
                    ->save();
            } else {
                    $news->fill($request->all())
                        ->save();
                };
                return redirect(route('admin.news.index'))
                    ->with('success', 'News successfully updated!'); // if record was updated it open news CRUD page
            } else {
                // if record was not added it come back to form with error message
                // Store session data to pass back in form in case of some error
                $request->flash();
                return redirect(route('admin.news.create'))
                    ->with('error',  'Cannot update News! :(');
            }
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

    protected function getFilePath($attribute, $folder, Request $request)
    {
        $path = null;
        $url = null;
        if ($request->file($attribute)) {
            $path = \Storage::putFile($folder, $request->file($attribute));
            $url = \Storage::url($path);
            return [
                'path' => $path,
                'url' => $url
            ];
        } else {
            return false;
        }
    }

}
