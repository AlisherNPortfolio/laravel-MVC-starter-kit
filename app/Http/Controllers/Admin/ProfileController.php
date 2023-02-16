<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProfileAdditionalUpdate;
use App\Http\Requests\ProfileMainUpdate;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $currentUser = Auth::user();
        return view('admin.profile.index', [
            'user' => $currentUser
        ]);
    }

    public function updateMainData(ProfileMainUpdate $request)
    {
        $validated = $request->validated();
        User::updateCurrentUser($validated);
        return MessageHelper::saved();
    }

    public function update(ProfileAdditionalUpdate $request)
    {
        $validated = $request->validated();
        $user_id = Auth::user()->getAuthIdentifier();
        $validated['user_id'] = $user_id;

        Profile::query()->updateOrCreate(
            ['user_id' => $user_id],
            $validated
        );

        return MessageHelper::saved();
    }
}
