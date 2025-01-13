<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;


class ProfileController extends Controller
{

    public function index()
    {
        // Haal alle profielen op
        $profielen = Profile::with('user')->get(); 

        return view('profielen.index', compact('profielen'));
    }

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $profile = $user->profile; // Profiellink ophalen via de relatie

        return view('profile.edit', [
            'user' => $user,
            'profile' => $profile, // Profielgegevens doorgeven aan de view
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $user = $request->user();

        // Update de user gegevens
        $user->fill($request->validated());

        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
        }

        $user->save();

        // Update de profielgegevens
        $profileData = $request->only(['gebruikersnaam', 'verjaardag', 'bio']);

        // Profielfoto uploaden indien aanwezig
        if ($request->hasFile('profielfoto')) {
            $profielfotoPath = $request->file('profielfoto')->store('profile-pictures', 'public');

            // Oude profielfoto verwijderen als er al een was
            if ($user->profile->profielfoto) {
                Storage::disk('public')->delete($user->profile->profielfoto);
            }

            $profileData['profielfoto'] = $profielfotoPath;
        }

        $user->profile()->update($profileData);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }
    

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
