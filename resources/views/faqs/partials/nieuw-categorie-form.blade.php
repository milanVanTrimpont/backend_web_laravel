<!-- Formulier voor het toevoegen van een nieuwe categorie -->
<section>
        <h3 class="text-xl font-semibold mb-4">Nieuwe Categorie toevoegen</h3>
        <form method="POST" action="{{ route('categorieën.store') }}">
            @csrf
            <div class="mb-6">
                <label for="categorie_naam" class="block text-gray-700 font-medium">Categorie Naam:</label>
                <input type="text" name="naam" id="categorie_naam" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>

            <x-primary-button>{{ __('Categorie Toevoegen') }}</x-primary-button>
        </form>
</section>