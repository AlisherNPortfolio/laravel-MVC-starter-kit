<?php

namespace App\Plugins\Home\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('plugin:home::admin.index');
    }
}
