<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    public function index()
    {
        // Haal alle profielen op
        $profielen = Profile::with('user')->get(); 

        return view('profielen.index', compact('profielen'));
    }

    public function admin()
    {
        // Haal alle profielen op
        $profielen = Profile::with('user')->get(); 
        
        return view('profielen.bewerking', compact('profielen'));
    }

    /**
     * Display the user's profile form (for the logged-in user).
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $profile = $user->profile; 

        return view('profile.edit', [
            'user' => $user,
            'profile' => $profile, 
        ]);
    }

    /**
     * Update the user's profile information (for the logged-in user).
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

    // voor alle profielen aan te passen
    public function editAsAdmin(Request $request, $userId): View
    {
        // Haal het profiel van de opgegeven gebruiker op
        $user = User::findOrFail($userId);
        $profile = $user->profile;

        return view('profielen.editAsAdmin', compact('user', 'profile'));

    }

   
    public function updateAsAdmin(Request $request, $userId)
    {
        // Haal de gebruiker op aan de hand van de userId
        $user = User::findOrFail($userId); 

        // Haal het profiel van de gebruiker op via de relatie
        $profile = $user->profile;

        $data = $request->validate([
            'gebruikersnaam' => 'required|string|max:255',
            'verjaardag' => 'required|date',
            'bio' => 'nullable|string',
            'profielfoto' => 'nullable|image|max:1024',
            'usertype' => 'required|in:user,admin',
        ]);

        // Upload de profielfoto indien aanwezig
        if ($request->hasFile('profielfoto')) {
            // Sla de nieuwe foto op
            $data['profielfoto'] = $request->file('profielfoto')->store('profile-pictures', 'public');
            
            // oude foto erwijderen indien nodig
            if ($profile->profielfoto) {
                Storage::disk('public')->delete($profile->profielfoto);
            }
        }

        // Werk het profiel bij met de gegevens
        $profile->update($data);

        // Werk de gebruikersrol bij
        $user->usertype = $data['usertype']; 
        $user->save();


        return redirect()->back()->with('status', 'Profiel succesvol bijgewerkt.');
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