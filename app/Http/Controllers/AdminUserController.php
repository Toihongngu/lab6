<?php

// app/Http/Controllers/AdminUserController.php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function toggleActive(User $user)
    {
        $user->active = !$user->active;
        $user->save();
        return redirect()->back()->with('status', 'User status updated!');
    }
}
