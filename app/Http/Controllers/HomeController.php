<?php

namespace App\Http\Controllers;

use App\Excel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function home()
    {

        return view('home');
    }

    public function excel()
    {
        if(Excel::writeExcel('report')) {
            return $exclFile = \Storage::disk('public')->download('report.xlsx');
//            return response()->download($exclFile);
//                ->header('Content-Disposition', 'attachment; filename = hello world.xlsx');
        }
        return response()->exception;
    }
}
