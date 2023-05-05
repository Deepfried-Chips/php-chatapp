<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class UserController extends Controller
{
    public function create()
    {
        return Inertia::render('user/register');
    }

    public function login()
    {
        return Inertia::render('user/login');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:32', ],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $email = trim(strtolower($formFields['email']));

        $formFields['avatar'] = 'https://gravatar.com/avatar/' . md5($email) . '?d=' . asset('/images/chipsblankie.png');

        $user = User::create($formFields);

        auth()->login($user);

        return redirect('/')->with('message','Registered');
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message','Logged out');
    }

    public function authenticate(Request $request)
    {
        $formFields = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();

            return redirect('/')->with('message','Logged in');
        }

        return back()->withErrors(['email' => 'Invalid credentials'])->onlyInput('email');
    }

    public function modify(Request $request)
    {
        $formFields = $request->validate([
            'name' => ['required', 'min:3', 'max:32', ],
            'email' => ['required', 'email', 'max:255', Rule::unique('users', 'email')->ignore(auth()->user()->id)],
            'password' => 'required|confirmed|min:6',
        ]);

        $formFields['password'] = bcrypt($formFields['password']);

        $user = User::find(auth()->user()->id);

        $user->update($formFields);

        return redirect('/')->with('message','Updated');
    }
}
