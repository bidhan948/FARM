<?php

namespace App\Http\Controllers\role_ad_permission;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RoleAndPermissionController extends Controller
{
    public function index(): View
    {
        return view('role_and_permssion.role', [
            'roles' => Role::query()->get()
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $attribute = $request->validate(['name' => 'required']);
        Role::create($attribute);
        toast("भूमिका थप्न सफल भयो", "success");
        return redirect()->back();
    }

    public function managePermission(Role $role): View
    {
        // this is for storing only permission id since role is linked to permission and we can check in manage permission view using its id
        if ($role->has('permissions')) {
            $permissionViaRole = $role->permissions->pluck('id')->toArray();
        } else {
            $permissionViaRole = [];
        }

        return view('role_and_permssion.manage_permission', [
            'role' => $role->load('permissions'),
            'permissions' => Permission::query()->get(),
            'permissionArr' => $permissionViaRole
        ]);
    }

    /************************this is for assigning permission via role****************************************/
    public function update(Request $request, Role $role): RedirectResponse
    {
        if (!$request->has('permission')) {
            Alert::error("अनुमति प्रबन्ध फिल्ड छ");
            return redirect()->back();
        }

        $role = Role::findById($role->id);
        $role->syncPermissions($request->permission);
        toast('अनुमति प्रबन्ध हाल्न सफल भयो ', 'success');
        return redirect()->route('role.index');
    }

    /******************************BELOW CODE IS FOR PERMISSION*********************************/
    public function indexPermission(): View
    {
        return view('role_and_permssion.permission', [
            'permissions' => Permission::query()->get()
        ]);
    }

    public function storePermission(Request $request): RedirectResponse
    {
        $attribute = $request->validate(['name' => 'required:unique:permissions']);
        Permission::create($attribute);
        toast("अनुमति थप्न सफल भयो", "success");
        return redirect()->back();
    }
}
