<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserUpdatedRequest;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        // $users = User::all();
        // Muestra los usuarios excepto el usuario que esta logeado
        $users = User::all()->except(Auth::id());

        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit', compact('user', 'roles'));
    }

    public function update(UserUpdatedRequest $request, User $user)
    {
        $user->update($request->validated());

        return to_route('admin.users.index')->with('message', 'User updated susseccfully!!');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return back()->with('message', 'User deleted susseccfully!!');
    }
}
