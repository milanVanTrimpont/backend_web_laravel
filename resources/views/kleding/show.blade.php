<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $kledingItem->titel }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- Kleding item card --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <p class="text-gray-700 whitespace-pre-line">{{ $kledingItem->content }}</p>

                @if($kledingItem->foto)
                    <img
                        src="{{ asset('storage/kleding/' . $kledingItem->foto) }}"
                        alt="Foto van {{ $kledingItem->titel }}"
                        class="mt-4 rounded-lg w-full object-cover"
                    >
                @endif
            </div>

            {{-- Reactie formulier --}}
            @auth
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">Plaats een reactie</h3>

                    <form method="POST" action="{{ route('comment.store', ['id' => $kledingItem->id]) }}" class="space-y-4">
                        @csrf
                        <div>
                            <textarea
                                name="body"
                                rows="3"
                                required
                                class="block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 @error('body') border-red-500 @enderror"
                                placeholder="Schrijf je reactie…">{{ old('body') }}</textarea>
                            @error('body')
                                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <button
                            type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-md font-semibold text-black hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                            Plaats reactie
                        </button>
                    </form>
                </div>
            @else
                <div class="bg-white shadow sm:rounded-lg p-6">
                    <p class="text-gray-700">
                        <a href="{{ route('login') }}" class="text-indigo-600 underline">Log in</a>
                        om een reactie te plaatsen.
                    </p>
                </div>
            @endauth

            {{-- Reacties lijst --}}
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h3 class="text-lg font-medium text-gray-900">
                    Reacties ({{ $kledingItem->comments->count() }})
                </h3>

                <div class="mt-4 space-y-6">
                    @forelse($kledingItem->comments as $comment)
                        <div class="border-b pb-4 last:border-0 last:pb-0">
                            <div class="flex items-center gap-2 text-sm text-gray-500">
                                <span class="font-semibold text-gray-800">
                                    {{ $comment->user->name ?? 'Onbekend' }}
                                </span>
                                <span>•</span>
                                <span>{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            <p class="mt-2 text-gray-800 whitespace-pre-line">
                                {{ $comment->body }}
                            </p>
                        </div>
                    @empty
                        <p class="text-gray-600">Er zijn nog geen reacties.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
