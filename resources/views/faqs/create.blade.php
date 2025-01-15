<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Nieuwe FAQ') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 bg-white shadow-md rounded-lg p-8">
            <form method="POST" action="{{ route('faqs.store') }}">
                @csrf
                <div class="mb-6">
                    <label for="categorie_id" class="block text-gray-700 font-medium">Categorie:</label>
                    <select name="categorie_id" id="categorie_id" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                        @foreach ($categorieën as $categorie)
                            <option value="{{ $categorie->id }}">{{ $categorie->naam }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-6">
                    <label for="vraag" class="block text-gray-700 font-medium">Vraag:</label>
                    <input type="text" name="vraag" id="vraag" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div class="mb-6">
                    <label for="antwoord" class="block text-gray-700 font-medium">Antwoord:</label>
                    <textarea name="antwoord" id="antwoord" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" rows="6"></textarea>
                </div>

                <x-primary-button>{{ __('FAQ Toevoegen') }}</x-primary-button>
            </form>
            <br>
            <!-- Formulier voor het toevoegen van een nieuwe categorie -->
            <div class="mt-8">
                <h3 class="text-xl font-semibold mb-4">Nieuwe Categorie Toevoegen</h3>
                <form method="POST" action="{{ route('categorieën.store') }}">
                    @csrf
                    <div class="mb-6">
                        <label for="categorie_naam" class="block text-gray-700 font-medium">Categorie Naam:</label>
                        <input type="text" name="naam" id="categorie_naam" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                    </div>

                    <x-primary-button>{{ __('Categorie Toevoegen') }}</x-primary-button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
