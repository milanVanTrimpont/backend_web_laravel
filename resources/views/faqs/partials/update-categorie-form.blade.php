</section>
<form method="POST" action="{{ route('categorieën.update', $categorie->id) }}" class="mt-2">
    @csrf
    @method('PUT')

    <!-- Dropdown met alle categorieën -->
    <label for="categorie_id" class="block text-gray-700 font-medium">Selecteer een Categorie om bij te werken:</label>
    <select name="categorie_id" id="categorie_id" required
            class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        @foreach ($categorieën as $cat)
            <option value="{{ $cat->id }}" {{ $categorie->id == $cat->id ? 'selected' : '' }}>
                {{ $cat->naam }}
            </option>
        @endforeach
    </select>

    <br>

    <!--Nieuwe naam-->
    <label for="naam" class="block text-gray-700 font-medium">Nieuwe categorienaam:</label>
    <input type="text" name="naam" id="naam" required
           class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">

    <br>

    <x-primary-button>
        {{ __('Categorie Bijwerken') }}
    </x-primary-button>
</form>
</section>
