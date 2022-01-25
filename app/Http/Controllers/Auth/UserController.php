<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\UserSubmitRequest;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Role;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index(): View
    {
        return view('auth.user', [
            'users' => User::query()
                ->whereNotNull('ward_no')
                ->with('roles')
                ->get(),
            'roles' => Role::query()
                ->exceptSuperAdmin()
                ->get()
        ]);
    }

    public function store(UserSubmitRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $user = user::create($request->validated());
            $user->assignRole($request->role);
        });
        toast('प्रयोगकर्ता थप्न सफल भयो ', 'success');
        return redirect()->back();
    }

    public function update(Request $request, user $user): RedirectResponse
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => ['required', Rule::unique('users')->ignore($user)],
            'ward_no' => 'required',
            'role' => 'required'
        ]);

        DB::transaction(function () use ($user, $validate) {
            $roles = $user->load('roles');
            if ($roles->roles->count() > 0) {
                $user->removeRole($roles->roles[0]->name);
            }
            $user->assignRole($validate['role']);
            $user->update($validate);
        });

        toast('प्रयोगकर्ता सच्याउन सफल भयो ', 'success');
        return redirect()->route('user.index');
    }

    public function passwordChange(Request $request, User $user): RedirectResponse
    {
        $request->validate(['password' => ['required', 'string', 'min:8', 'confirmed']]);
        // if (Hash::check($request->password, $user->password)) {
        //     Alert::error('पासवोर्ड पहिलानै प्रयोग गरिएको छ ');
        //     return redirect()->back();
        // }
        // using query builder because orm is not working here :(
        DB::table('users')->where('id',$user->id)->update([
            'password' => Hash::make($request->password)
        ]);
        toast('प्रयोगकर्ताको पासवोर्ड सच्याउन सफल भयो', 'success');
        return redirect()->route('user.index');
    }
}
