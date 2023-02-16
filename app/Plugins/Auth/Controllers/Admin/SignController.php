<?php

namespace App\Plugins\Auth\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {
            // TODO: all validation checking codes should assembly in one
            try {
                $request->validate([
                    'email' => 'required|string|email|max:255',
                    'password' => 'required|string|min:5|max:15'
                ]);
            } catch (\InvalidArgumentException $exception) {
                return back()->with('error', $exception->getMessage());
            }
            $creditionals = $request->only(['email', 'password']);
            if (Auth::attempt($creditionals, isset($request->remember) && $request->remember === 'on')) {
                return redirect('admin');
            }
            return back()->with('error', 'Email or password is wrong!');
        }
        return view('plugin:auth::admin::sign-in');
    }

    public function logout(Request $request)
    {
        if ($request->isMethod('POST')) {
            Auth::logout();
            return redirect('plugin::auth::admin::sign-in');
        }
        return redirect()->back();
    }
}
