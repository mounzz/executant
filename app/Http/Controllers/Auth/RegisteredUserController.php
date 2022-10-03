<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\avatar;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $avatars = avatar::all();
        return view('auth.register', compact('avatars'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->lastName = $request->lastName;
        $user->age = $request->age;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);

        if($request->avatar_id != null) {
            $user->avatar_id = $request->avatar_id;
        }else{
            $user->avatar_id = 1;
        }

        $user->save();

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
