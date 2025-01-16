</section>
    <form method="POST" action="{{ route('categorieën.destroy', $categorie->id) }}" class="mt-2" onsubmit="return confirm('Weet je zeker dat je deze categorie wilt verwijderen? Hiermee verwijder je ook alle FAQs bij deze categorie');">

        @csrf
        @method('DELETE')

        <!-- dropdown met alle categorieën -->
        <label for="categorie_id" class="block text-gray-700 font-medium">Selecteer een Categorie:</label>
            <select name="categorie_id" id="categorie_id" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                @foreach ($categorieën as $categorie)
                    <option value="{{ $categorie->id }}">{{ $categorie->naam }}</option>
                @endforeach
            </select>
        <br>
        <x-danger-button>{{ __('FAQ Verwijderen') }}</x-danger-button>
    </form>
</section>