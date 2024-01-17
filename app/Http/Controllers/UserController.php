<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //Show Register Form
    public function register()
    {
        return view("auth.register");
    }
    // Register The User
    public function store(Request $request)
    {
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email", Rule::unique("users", "email")],
            "password" => "required|confirmed|min:8"
        ]);

        // Hash Password
        $formFields["password"] = bcrypt($formFields["password"]);


        // Create User
        $user = User::create($formFields);

        //Login
        auth()->login($user);

        return redirect('/')->with("message", "User created and logged in");
    }
    //Show Login Form
    public function login()
    {
        return view("auth.login");
    }

    //Logout User
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/")->with("message", "You have been logged out successfully.");
    }

    //Log In User
    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            "email" => ["required", "email"],
            "password" => "required"
        ]);
        if (auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with("message", "You are now logged In successfully");
        }

        return back()->withErrors(["email" => "Invalid Credentials"]);
    }
}
