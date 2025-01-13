<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="gebruikersnaam" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="gebruikersnaam" :value="__('gebruikersnaam')" />
            <x-text-input id="gebruikersnaam" name="gebruikersnaam" type="text" class="mt-1 block w-full" :value="old('gebruikersnaam', $profile->gebruikersnaam)" required />
            <x-input-error class="mt-2" :messages="$errors->get('gebruikersnaam')" />
        </div>

        <div>
            <x-input-label for="verjaardag" :value="__('verjaardag')" />
            <x-text-input id="verjaardag" name="verjaardag" type="date" class="mt-1 block w-full" :value="old('verjaardag', $profile->verjaardag)" required />
            <x-input-error class="mt-2" :messages="$errors->get('verjaardag')" />
        </div>

        <div>
            <x-input-label for="profielfoto" :value="__('Profile Picture')" />
            <input id="profielfoto" name="profielfoto" type="file" class="mt-1 block w-full" />
            @if ($profile->profielfoto)
                <img src="{{ asset('storage/' . $profile->profielfoto) }}" alt="Profile Picture" class="mt-2 w-20 h-20 rounded-full">
            @endif
            <x-input-error class="mt-2" :messages="$errors->get('profielfoto')" />
        </div>

        <div>
            <x-input-label for="bio" :value="__('Bio')" />
            <textarea id="bio" name="bio" class="mt-1 block w-full" rows="4">{{ old('bio', $profile->bio) }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('bio')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>
</section>
