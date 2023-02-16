<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\MessageHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Permission;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::query()->get();
        return view('admin.roles.index', compact('roles'));
    }

    public function show($id)
    {
        if (!$role = Role::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        return view('admin.roles.show', compact('role'));
    }

    public function create()
    {
        $guards = Permission::getGuards();
        $permissions = Permission::query()->get();
        return view('admin.roles.create', compact('guards', 'permissions'));
    }

    public function store(RoleRequest $request)
    {
        $validated = $request->validated();
        DB::beginTransaction();
        try {
            $msgType = MessageHelper::MESSAGE_TYPE_SUCCESS;
            $msgText = MessageHelper::SAVED_SUCCESSFULLY_TEXT;
            $role = Role::query()->firstOrCreate(
                ['name' => $validated['name'], 'guard_name' => $validated['guard_name']],
                $validated
            );

            if ($validated['permissions']) {
                $role->savePermissions($validated['permissions']);
            }
            DB::commit();
        } catch (\PDOException $exception) {
            $msgType = MessageHelper::MESSAGE_TYPE_ERROR;
            $msgText = $exception->getMessage();
            DB::rollBack();
        }

        return back()->with($msgType, $msgText);
    }

    public function edit($id)
    {
        if (!$role = Role::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        $guards = Permission::getGuards();
        $permissions = Permission::query()->get();

        return view('admin.roles.update', compact('role', 'guards', 'permissions'));
    }

    public function update(RoleRequest $request, $id)
    {
        $validated = $request->validated();
        if (!$role = Role::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }

        DB::beginTransaction();
        try {
            $msgType = MessageHelper::MESSAGE_TYPE_SUCCESS;
            $msgText = MessageHelper::SAVED_SUCCESSFULLY_TEXT;
            $role->update($validated);
            if (isset($validated['permissions'])) {
                $role->savePermissions($validated['permissions']);
            }
            DB::commit();
        } catch (\PDOException $e) {
            $msgType = MessageHelper::MESSAGE_TYPE_SUCCESS;
            $msgText = $e->getMessage();
            DB::rollBack();
        }

        return back()->with($msgType, $msgText);
    }

    public function destroy($id)
    {
        if (!$role = Role::query()->find($id)) {
            return MessageHelper::recordNotFound();
        }
        DB::beginTransaction();
        try {
            $msgType = MessageHelper::MESSAGE_TYPE_SUCCESS;
            $msgText = MessageHelper::DELETED_SUCCESSFULLY;
            $role->delete();
            $role->permission()->sync([]);
            DB::commit();
        } catch (\PDOException $e) {
            $msgType = MessageHelper::MESSAGE_TYPE_ERROR;
            $msgText = $e->getMessage();
            DB::rollBack();
        }

        return back()->with($msgType, $msgText);
    }
}
