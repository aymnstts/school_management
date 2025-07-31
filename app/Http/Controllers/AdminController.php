<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; 

class AdminController extends Controller
{

    public function dashboard()
    {
        
        return view('admin.dashboard');
    }

    public function manageUsers()
{
    $users = User::all();
    return view('admin.usersManagement.usersView', compact('users'));
}

    public function createUser()
    {
        return view('admin.usersManagement.createUser');
    }

    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string',
        ]);
    
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role = $request->role;
        $user->save(); 
    
        return redirect()->route('admin.usersManagement.usersView')->with('success', 'User added successfully.');
    }

    public function destroyUser($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('usersView')->with('success', 'User deleted successfully.');
    }
    
 
    // Add more methods for other functionalities as needed
}
