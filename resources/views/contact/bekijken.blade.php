<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Ingezonden contact formulieren') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <table class="min-w-full table-auto">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">ID</th>
                            <th class="px-4 py-2">Email</th>
                            <th class="px-4 py-2">Onderwerp</th>
                            <th class="px-4 py-2">Vraag</th>
                            <th class="px-4 py-2">Verzonden op</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($forms as $form)
                            <tr>
                                <td class="border px-4 py-2">{{ $form->id }}</td>
                                <td class="border px-4 py-2"><a href="mailto:{{ $form->email }}" class="text-blue-500 hover:underline">{{ $form->email }}</a>                                </td>
                                <td class="border px-4 py-2">{{ $form->onderwerp }}</td>
                                <td class="border px-4 py-2">{{ $form->vraag }}</td>
                                <td class="border px-4 py-2">{{ $form->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center px-4 py-2">Geen gegevens gevonden.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
                <div class="mt-4">
                    {{ $forms->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>