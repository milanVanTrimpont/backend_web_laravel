<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Profile;


class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $usertype = $request->has('usertype') && $request->usertype == 'admin' ? 'admin' : 'user';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'usertype' => $usertype,
        ]);

        // Maak automatisch een profiel aan voor de gebruiker
        $profiel = Profile::create([
            'user_id' => $user->id,
            'gebruikersnaam' => $user->name,  // Gebruikersnaam kan standaard de naam zijn
            'bio' => 'Welkom op mijn profiel!',  // Standaard bio
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(route('kleding', absolute: false));
    }
}
