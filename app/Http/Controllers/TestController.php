<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function index()
    {
//        dd(glob(public_path() . '/*'));
        $dirs = array_filter(glob(storage_path('*')), 'is_dir');
        dd($dirs);
        return view('admin.test.index');
    }

    public function drag_drop()
    {
        return view('admin.test.drag_drop');
    }
}
