<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('faqs.partials.nieuw-categorie-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                @foreach ($categorieën as $categorie)
                        @endforeach
                        <h3 class="text-xl font-semibold mb-4">Categorie updaten</h3>
                        <!--update formulier-->
                        @include('faqs.partials.update-categorie-form', ['categorie' => $categorie])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                @foreach ($categorieën as $categorie)
                        @endforeach
                        <h3 class="text-xl font-semibold mb-4">Categorie verwijderen</h3>
                        <!--verwijder formulier-->
                        @include('faqs.partials.categorie-verwijderen-form', ['categorie' => $categorie])
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('faqs.partials.nieuw-faq-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <h3 class="text-xl font-semibold mb-4">FAQ bewerken</h3>
                        @foreach ($categorieën as $categorie)
                            <strong>{{ $categorie->naam }}</strong>
                            <ul class="list-disc list-inside mb-4">
                                @forelse ($categorie->faqs as $faq)

                                <form method="POST" action="{{ route('faqs.update', $faq->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="mt-4">
                                        <strong>vraag</strong>
                                        <input id="vraag" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" type="text" name="vraag" value="{{ old('vraag', $faq->vraag) }}" required autofocus />
                                    </div>

                                    <div class="mt-4">
                                    <strong>antwoord</strong>
                                        <textarea id="antwoord" class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500" name="antwoord" required>{{ old('antwoord', $faq->antwoord) }}</textarea>
                                    </div>

                                    <div class="flex items-center mt-4">
                                        <x-primary-button>{{ __('Opslaan') }}</x-primary-button>
                                    </div>
                                </form>
                                    @include('faqs.partials.faq-verwijderen-form')
                                @empty
                                    <li>Geen vragen beschikbaar in deze categorie.</li>
                                @endforelse
                                
                            </ul>
                        @endforeach
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
