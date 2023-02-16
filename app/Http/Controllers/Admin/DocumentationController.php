<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DocumentationController extends Controller
{
    private $exampleViews = [
        '404', '500', 'basic-table', 'blank',
        'buttons', 'calendar', 'charts', 'chat',
        'compose', 'datatable', 'email', 'forms',
        'google-maps', 'index', 'signin', 'signup',
        'ui', 'vector-maps'
    ];

    public function index(Request $request, string $viewName)
    {
        if (!in_array($viewName, $this->exampleViews)) {
            return view('404');
        }
        return view("admin.documentation.$viewName");
    }
}
