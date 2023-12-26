<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('profile');
    }

    // هذه الكود الخاص بصلاحيات البروفايل المستخدم
    public function update()
    {
        $userId = auth()->id();
        $data = request()->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email'],
            'password' => ['nullable', 'confirmed', 'min:5'],
            'image' => ['image', 'mimes:jpeg,jpg,png']
        ]);

        if (request()->has('password')) {
            $data['password'] = Hash::make(request('password'));
        }

        if(request()->hasFile('image')) {
            $path = request('image')->store('users', 'public');
            $data['image'] = $path;
        }
        User::findOrFail($userId)->update($data);
        return back();        
    }
}
