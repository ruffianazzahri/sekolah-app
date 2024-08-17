<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function profilepage()
    {
        return view('profile');
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];


        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
