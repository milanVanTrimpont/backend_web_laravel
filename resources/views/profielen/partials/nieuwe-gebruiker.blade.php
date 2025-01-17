<!-- Formulier voor het toevoegen van een nieuwe faq -->
<section>
<h3 class="text-xl font-semibold mb-4">Nieuwe gebruiker toevoegen</h3>
    <form method="POST" action="{{ route('profielen.store') }}">
        @csrf
        
        <div class="mb-6">
            <label for="name" class="block text-gray-700 font-medium">Naam:</label>
            <input type="text" name="name" id="name" value="" autocomplete="off" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-6">
            <label for="email" class="block text-gray-700 font-medium">Email:</label>
            <input type="text" name="email" id="email" value="" autocomplete="off" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-gray-700">Wachtwoord:</label>
            <input id="password" type="password" name="password" value="" autocomplete="new-password"  required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <!-- Bevestig wachtwoord -->
        <div class="mb-4">
            <label for="password_confirmation" class="block text-gray-700">Bevestig Wachtwoord:</label>
            <input id="password_confirmation" type="password" name="password_confirmation" required class="mt-1 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
        </div>

        <div class="mb-6">
            <label for="usertype" class="block text-gray-700 font-medium">Rol:</label>
            <select id="usertype" name="usertype" required class="mt-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
                <option value="user">Gebruiker</option>
                <option value="admin">Admin</option>
            </select>
        </div>


        <x-primary-button>{{ __('gebruiker aanmaken') }}</x-primary-button>
    </form>
</section>