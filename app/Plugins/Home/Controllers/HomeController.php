<?php


namespace App\Plugins\Home\Controllers;


use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        return view('plugin:home::index');
    }
}
