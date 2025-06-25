<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;

class AdminUserController extends Controller
{

        public function index() {
        $users = User::paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function edit(User $user) {
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, User $user) {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'role' => 'required|in:admin,manager,user',
            'is_active' => 'required|boolean',
        ]);

        $user->update($request->only(['name', 'email', 'role', 'is_active']));
        return redirect()->route('admin.users.index')->with('success', 'User updated.');
    }

    public function destroy(User $user) {
        $user->delete();
        return back()->with('success', 'User deleted.');
    }
}
