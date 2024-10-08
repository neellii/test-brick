<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Http\Requests\User\LoginRequest;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;


class UserController extends Controller
{

     /**
     * Show the form for creating a new resource. register
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage. register
     */
    public function store(StoreRequest $request)
    {
        $validated = $request->validated();

        $user =  User::create(collect($validated)->all());
        
        event(new Registered($user));
        Auth::login($user);

        return redirect()->route('verification.notice');
    }

    /**
     * Shoiw Login User form
     */
    public function login()
    {
        return view('user.login');
    }

/**
     * Login User
     */
    public function loginAuth(LoginRequest $request)
    {
        $credentials = $request->validated();

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route("home"))->with("success","Добро пожаловать, " . Auth::user()->name . "!");
        }

        return back()->withErrors([
            'email' => 'Неправильный email или пароль',
        ])->onlyInput('email');
    }

     /**
     * Logout User
     */
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
 
        $request->session()->regenerateToken();

        return redirect()->route("login");
    }

    /**
     * Show user profile
     */
    public function profile() {
        $user = Auth::user();
        return view('user.profile', compact('user'));
    }

    
     /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, User $user)
    {
        $user->update($request->validated());

        return redirect()->route('user.profile', $user->id)->with('success', 'Данные успешно обновлены');
    }
}
