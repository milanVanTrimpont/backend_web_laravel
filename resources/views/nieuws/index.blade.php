<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('nieuws') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
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
                                <p class="text-sm text-gray-500 mt-2">Publicatiedatum: {{ $nieuwsItem->created_at->format('d-m-Y') }}</p>
                                <p class="text-sm text-gray-500 mt-2">Laatst bewerkt: {{ $nieuwsItem->updated_at->format('d-m-Y') }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
