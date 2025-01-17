<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kleding') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="text-2xl font-bold mb-6">Hier zie je een overzicht met de kleding archief</h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        @foreach ($kledingItems as $kledingItem)
                            <div class="border rounded-lg p-4 shadow-md bg-gray-100">
                                <h2 class="text-lg font-bold mb-2">{{ $kledingItem->titel }}</h2>
                                @if ($kledingItem->foto)
                                    <img src="{{ asset('storage/' . $kledingItem->foto) }}" alt="foto" class="mb-4">
                                @endif
                                <p>{{ Str::limit($kledingItem->content, 100) }}</p>
                                <p class="text-sm text-gray-500 mt-2">Publicatiedatum: {{ $kledingItem->created_at->format('d-m-Y') }}</p>
                                <p class="text-sm text-gray-500 mt-2">Laatst bewerkt: {{ $kledingItem->updated_at->format('d-m-Y') }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
