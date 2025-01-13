<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Maak een Nieuws Artikel') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Hier kun je een nieuw nieuwsartikel aanmaken en publiceren.") }}
        </p>
    </header>

    <form method="post" action="{{ route('nieuws.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        <div>
            <x-input-label for="titel" :value="__('Titel')" />
            <x-text-input id="titel" name="titel" type="text" class="mt-1 block w-full" :value="old('titel')" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('titel')" />
        </div>

        <div>
            <x-input-label for="content" :value="__('Content')" />
            <textarea id="content" name="content" rows="5" class="mt-1 block w-full" required>{{ old('content') }}</textarea>
            <x-input-error class="mt-2" :messages="$errors->get('content')" />
        </div>

        <div>
            <x-input-label for="foto" :value="__('Afbeelding (optioneel)')" />
            <x-text-input id="foto" name="foto" type="file" class="mt-1 block w-full" />
            <x-input-error class="mt-2" :messages="$errors->get('foto')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Publiceer') }}</x-primary-button>

            @if (session('status') === 'news-created')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)" class="text-sm text-green-600">
                    {{ __('Artikel gepubliceerd.') }}
                </p>
            @endif
        </div>
    </form>
</section>
