<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('admin.index');
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function show($id)
    {
        $users = User::find($id);
        return view('admin.users.show', compact('users'));
    }

    public function account(User $user)
    {
        $user = auth()->user();
        return view('auth.account', compact('user'));
    }
}
