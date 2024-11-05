<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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
}