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
                                    <li>
                                        <div class="faq-item">
                                            <div class="faq-question"><strong>{{ $faq->vraag }}</strong></div>
                                            <div class="faq-answer">{{ $faq->antwoord }}</div>
                                            @include('faqs.partials.faq-verwijderen-form')
                                        </div>
                                        <br>
                                    </li>
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
