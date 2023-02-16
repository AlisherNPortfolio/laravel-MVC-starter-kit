<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::query()->get();
        return view('admin.permissions.index', compact('permissions'));
    }

    public function create()
    {
        $guards = Permission::getGuards();
        return view('admin.permissions.create', compact('guards'));
    }

    public function store(PermissionsRequest $request)
    {
        $validated = $request->validated();
        Permission::query()->firstOrCreate(
            ['name' => $validated['name'], 'guard_name' => $validated['guard_name']],
            $validated
        );
        return MessageHelper::saved();
    }

    public function edit($id)
    {
        if (!$permission = Permission::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        $guards = Permission::getGuards();

        return view('admin.permissions.update', compact('permission', 'guards'));
    }

    public function update(PermissionsRequest $request, $id)
    {
        $validated = $request->validated();
        if (!$permission = Permission::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        $permission->update($validated);
        return MessageHelper::saved();
    }

    public function show($id)
    {
        if (!$permission = Permission::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        return view('admin.permissions.show', compact('permission'));
    }

    public function destroy($id)
    {
        if (!$permission = Permission::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        $permission->delete();

        return MessageHelper::saved();
    }
}
