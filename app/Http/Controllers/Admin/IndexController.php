<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('admin.index')->with('user', 'admin');
    }

    public function action2() {
        return view('admin.action2')->with('user', 'admin');
    }


}
