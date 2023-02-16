<?php

namespace App\Services;

use App\Helpers\MessageHelper;
use App\Models\User;
use Illuminate\Support\Facades\Log;

class UserService
{
    public function saveMain(array $request, int $id)
    {
        try {
            User::updateCurrentUser($request);
        } catch (\Exception $e) {
            return false;
        }

        return true;
    }

    public function saveProfile(array $attributes, int $id)
    {
        $user = $this->getUser($id);

        try {
            if (!$user->profile) {
                // dd($attributes);
                $user->profile()->create($attributes);
            } else {
                $user->profile()->update($attributes);
            }
        } catch (\Exception $e) {
            Log::info($e->getMessage());
            return false;
        }

        return true;
    }

    public function getUser(int $id)
    {
        $user = User::query()->find($id);

        abort_if(!$user, MessageHelper::NOT_FOUND_CODE, MessageHelper::NOT_FOUND_TEXT);

        return $user;
    }
}
