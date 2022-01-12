<?php

namespace App\Http\Controllers\role_ad_permission;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

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
        dd($role);
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
