<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index() {
        return view('admin.main');
    }

    public function action1() {
        return view('admin.action1');
    }

    public function action2() {
        return view('admin.action2');
    }

    public function logout() {
        return view('main');
    }
}
