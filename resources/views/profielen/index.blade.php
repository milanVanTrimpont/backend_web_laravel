



<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Alle profielen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    @foreach($profielen as $profiel)
                    <div class="p-6 text-gray-900">
                    <div class="col-md-4">
                        <div class="profiel">
                            <strong>{{ $profiel->gebruikersnaam }}</strong>
                            <img src="{{ asset($profiel->profielfoto) }}" alt="profiel Picture" style="max-width: 200px;">
                            <p><strong>Verjaardag:</strong> {{ $profiel->verjaardag }}</p>
                            <p><strong>Bio:</strong> {{ $profiel->bio }}</p>
                        </div>
                    </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

