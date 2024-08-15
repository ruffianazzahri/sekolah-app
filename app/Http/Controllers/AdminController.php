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

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|confirmed|min:6',
        ]);

        // Update user information
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];

        // Check if password is present and update it
        if ($request->filled('password')) {
            $user->password = Hash::make($validatedData['password']);
        }
    /** @var \App\Models\User $user **/
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}