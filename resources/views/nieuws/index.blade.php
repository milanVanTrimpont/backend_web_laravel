<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nieuws') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Formulier voor een nieuw artikel aan te maken -->
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        @include('nieuws.partials.nieuw-nieuwsartikel-form')
                    </div>
                </div>
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Nieuws Items</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($nieuwsItems as $nieuwsItem)
                            <div class="border rounded-lg p-4 shadow-md bg-gray-100">
                                <h2 class="text-lg font-bold mb-2">{{ $nieuwsItem->titel }}</h2>
                                @if ($nieuwsItem->foto)
                                    <img src="{{ asset('storage/' . $nieuwsItem->foto) }}" alt="foto" class="mb-4">
                                @endif
                                <p>{{ Str::limit($nieuwsItem->content, 100) }}</p>
                                <p class="text-sm text-gray-500 mt-2">Published: {{ $nieuwsItem->publicatiedatum }}</p>

                                <form method="POST" action="{{ route('nieuws.destroy', $nieuwsItem) }}" class="mt-4">
                                    @csrf
                                    @method('DELETE')<!--extra confirmatie -->
                                    <x-danger-button onclick="return confirm('Weet je zeker dat je dit artikel wilt verwijderen?')">
                                        {{ __('Verwijder') }}
                                    </x-danger-button>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
