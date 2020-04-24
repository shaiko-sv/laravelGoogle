<?php

namespace App\Http\Controllers\Admin;

use App\Resources;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
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
        $resources = Resources::query()->select(['id', 'link', 'created_at'])->paginate(10);

        return view('admin.resources')->with('resources', $resources);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Resources $resource)
    {
        return view('admin.resourceForm',
            ['resource' => $resource]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Resources $resource
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function store(Resources $resource, Request $request)
    {
        $result = $resource->fill($request->all())->save();

        if($result) {
            return redirect(route('admin.resources.index'))
                ->with('success', 'Resource successfully created!'); // if record was added it open resource CRUD page
        } else {
            // if record was not added it come back to form with error message
            // Store session data to pass back in form in case of some error
            $request->flash();
            return redirect(route('admin.resources.create'))
                ->with('error',  'Cannot create Resource! :(');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param Resources $resource
     * @return \Illuminate\Http\Response
     */
    public function show(Resources $resource)
    {
        if (!empty($resource)) {
            return redirect()->away($resource->link);
        } else {
            return redirect()->route('admin.resources.index');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Resources $resource
     * @return \Illuminate\Http\Response
     */
    public function edit(Resources $resource)
    {
        return view('admin.resourceForm', [
            'resource' => $resource,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param Resources $resource
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Resources $resource)
    {
        $result = $resource->fill($request->all())->save();

        if($result) {
            return redirect(route('admin.resources.index'))
                ->with('success', 'Resource successfully updated!'); // if record was added it open resource CRUD page
        } else {
            // if record was not added it come back to form with error message
            // Store session data to pass back in form in case of some error
            $request->flash();
            return redirect(route('admin.resources.edit'))
                ->with('error',  'Cannot update Resource! :(');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Resources $resource
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Resources $resource)
    {
        $resource->delete();
        return redirect()->route('admin.resources.index')
            ->with('success', 'Resource successfully deleted!');
    }
}
