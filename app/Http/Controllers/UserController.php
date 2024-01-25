<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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

        return redirect('/')->with("success", "User created and logged in");
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
        return redirect("/")->with("success", "You have been logged out successfully.");
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

            return redirect('/')->with("success", "You are now logged In successfully");
        }

        return back()->withErrors(["email" => "Invalid Credentials"]);
    }

    //Get The Basic Info
    public function getInfo($username)
    {

        // Find the user by name
        $user = User::where('name', $username)->first();

        if (!$user) {
            abort(404); // User not found, return a 404 response
        }
        return view("auth.info", compact("user"));
    }

    //Show The Settings Page :
    public function showSettings()
    {

        $user = Auth::user();
        return view("auth.editProfile", ["user" => $user]);
    }

    // Update regular data
    public function updateRegularData(Request $request, User $user)
    {
        $formFields = $request->validate([
            "name" => ["required", "min:3"],
            "email" => ["required", "email"],
            "bio" => ["nullable"],
            "location" => ["nullable"]
        ]);
        if ($request->hasFile("avatar")) {
            $formFields["avatar"] = $request->file("avatar")->store("avatars", "public");
        }

        $user->update($formFields);
        return redirect()->back()->with('success', 'updated successfully');
    }

    // Update password
    public function updatePassword(Request $request, User $user)
    {
        $formFields = $request->validate([
            "current_password" => ["required"],
            "password" => ["required", "min:8"]
        ]);
        if (Hash::check($request->current_password, $user->password)) {
            // Hash Password
            $formFields["password"] = bcrypt($formFields["password"]);
        }
        $user->update($formFields);

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
