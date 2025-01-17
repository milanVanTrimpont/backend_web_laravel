<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profielen Bewerken') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Gebruikers Profielen</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('profielen.partials.nieuwe-gebruiker')
                    </div>
                </div>

                        @foreach ($profielen as $profile)
                            <div class="border rounded-lg p-4 shadow-md bg-gray-100">
                                <div class="flex items-center mb-4">
                                    
                                    <form method="POST" action="{{ route('profielen.updateAsAdmin', $profile->user_id) }}" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')         
                                        <div class="mb-6">
                                            <label for="gebruikersnaam" class="block text-gray-700 font-medium">gebruikersnaam:</label>
                                            <input type="text" name="gebruikersnaam" id="gebruikersnaam" value="{{ old('gebruikersnaam', $profile->gebruikersnaam) }}" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <div class="mb-6">
                                            <label for="usertype" class="block font-bold">Rol</label>
                                            <select id="usertype" name="usertype" required class="smt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                                <option value="user" {{ $profile->user->usertype === 'user' ? 'selected' : '' }}>Gebruiker</option>
                                                <option value="admin" {{ $profile->user->usertype === 'admin' ? 'selected' : '' }}>Admin</option>
                                            </select>
                                        </div>

                                        <div class="mb-6">
                                            <label for="profielfoto" class="block text-gray-700 font-medium">Foto</label>
                                            <input id="profielfoto" class="block mt-1 w-full" type="file" name="profielfoto">
                                            @if ($profile->profielfoto)
                                                <img src="{{ asset('storage/' . $profile->profielfoto) }}" alt="foto" class="mt-2 w-32">
                                            @endif
                                        </div>
  
                                        <div class="mb-6">
                                            <label for="verjaardag" class="block text-gray-700 font-medium">verjaardag:</label>
                                            <input type="date" name="verjaardag" id="verjaardag" value="{{ old('verjaardag', $profile->verjaardag) }}" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                                        </div>

                                        <div class="mb-6">
                                            <label for="bio" class="block text-gray-700 font-medium">Bio</label>
                                            <textarea id="bio" class="block mt-1 w-full" name="bio" required>{{ old('bio', $profile->bio) }}</textarea>
                                        </div>

                                        <div class="flex items-center mb-6">
                                            <x-primary-button>
                                                {{ __('Opslaan') }}
                                            </x-primary-button>
                                        </div>
                                    </form>
                                </div>
                                <form method="POST" action="{{ route('profielen.delete', $profile->user_id) }}" onsubmit="return confirm('Weet je zeker dat je deze gebruiker wilt verwijderen?');">
                                    @csrf
                                    @method('DELETE')

                                    <x-danger-button>
                                        {{ __('Verwijder Gebruiker') }}
                                    </x-danger-button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

