<!-- Formulier voor het toevoegen van een nieuwe faq -->
<section>
<h3 class="text-xl font-semibold mb-4">Nieuwe FAQ toevoegen</h3>
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
</section>