<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('login')
                ->withErrors(['email' => 'You must login first'])
                ->onlyInput('email');
        }
        $users = User::all();
        return view('auth.users', ['users' => $users]); // Corrected the view data passing
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('auth.edit', compact('user'));
    }

    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $id,
            'password' => 'nullable|min:8|confirmed',
            'photo' => 'image|nullable|max:1999',
        ]);

        $user = User::findOrFail($id);

        if ($request->hasFile('photo')) {
            // Delete the old photo if it exists
            $oldPhoto = public_path('storage/' . $user->photo);
    
            if (File::exists($oldPhoto)) {
                File::delete($oldPhoto);
            }
    
            // Handle the file upload
            $path = $request->file('photo')->store('photos', 'public');
            $user->photo = $path;
        }
    
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
    
        return redirect()->route('users.index')->with('success', 'User updated successfully');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully');
    }
}