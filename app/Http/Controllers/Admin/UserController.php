<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(): \Illuminate\View\View
    {
        return view('admin.user.index', [
            'users' => User::query()->orderBy('id')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $user = $this->service->getUser($id);

        return view('admin.user.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\View\View
     */
    public function edit($id)
    {
        if (!$user = User::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        // dd($user->profile);
        return view('admin.user.update', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $params = $request->all();
        if (array_key_exists('main', $params)) {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|string|max:255',
                'password' => 'nullable|string|max:255'
            ]);

            $saved = $this->service->saveMain($request->only(['name', 'email', 'password']), $id);
        }

        if (array_key_exists('additional', $params)) {
            $request->validate([
                'first_name' => 'required|string|max:255',
                'last_name' => 'required|string|max:255',
                'gender' => 'required|string|max:255',
                'self_description' => 'nullable|string|max:1000',
                'address' => 'nullable|string|max:255',
                'avatar' => 'nullable|image|max:4096',
            ]);

            $saved = $this->service->saveProfile($request->only([
                'first_name', 'last_name',
                'gender', 'self_description',
                'address', 'avatar'
            ]), $id);
        }

        if ($saved) {
            return redirect()
                ->route('users.index')
                ->with(MessageHelper::MESSAGE_TYPE_SUCCESS, MessageHelper::ERROR_ON_SAVING_TEXT);
        } else {
            return redirect()
                ->route('users.update', ['id' => $id])
                ->with(MessageHelper::MESSAGE_TYPE_ERROR, MessageHelper::SAVED_SUCCESSFULLY_TEXT);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
