<?php

namespace App\Http\Controllers;
// models
use App\Models\User;

// hash
// use illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
// use Illuminate\Validation\Rules\Unique;

class RegisterController extends Controller
{
    
    public function index()
    {
        return view('register.index', [
            'title' => 'Register',
            'active' => 'Register'
        ]);
    }

    public function store(Request $request)
    {
        // kalau validasi dari table users nya lolos dia akan menjalankan apapun yg dibawahnya
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255' 
        ]);
 
        /*1*/ 
        $validateData['password'] = bcrypt($validateData['password']);
        // $validateData['password'] = md5($validateData['password']);
        /*2*/ 
        // $validateData['password'] = Hash::make($validateData['password']);
         
        // masukan / create kedalam databases nya
        User::create($validateData);

        /*flash message before redirect*/ 
        // $request->session()->flash('success', 'Task was successful!');

        /*REDIRECT*/ 
        // return redirect('/login');
 
        /*REDIRECT + flash */ 

        return redirect('/login')->with('success', 'Registration Succesfully! Please Login! ');
    }
}
