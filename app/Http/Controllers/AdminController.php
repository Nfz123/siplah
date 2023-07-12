<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('layoutadmin.perusahaan.create');
    }
 
    
public function users()
{
    $adminRole = Role::where('name', 'admin')->firstOrFail();

    $users = User::whereHas('role', function ($query) use ($adminRole) {
        $query->where('id', $adminRole->id);
    })->get();

    return view('admin.users', compact('users'));
}

}
