<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Contact Formulier') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                @if (session('status'))
                    <div class="bg-green-500 text-white p-4 rounded mb-4">
                        {{ session('status') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('contact.send') }}">
                    @csrf

                    <div>
                        <label for="email">Email</label>
                        <input id="email" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="email" name="email" value="{{ old('email') }}" required />
                        @error('email')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4">
                        <label for="onderwerp">Onderwerp</label>
                        <input id="onderwerp" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="onderwerp" value="{{ old('onderwerp') }}" required />
                        @error('onderwerp')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4">
                        <label for="vraag">Vraag</label>
                        <textarea id="vraag" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="vraag" required>{{ old('vraag') }}</textarea>
                        @error('vraag')<span class="text-red-500 text-sm">{{ $message }}</span>@enderror
                    </div>

                    <div class="mt-4">
                        <x-primary-button>{{ __('Verstuur') }}</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
