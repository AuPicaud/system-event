<x-app-layout>
    <x-slot name="header">
        <div class="flex align-items-center">
            <a href="{{ route('events.index') }}" class="btn font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-0">Liste des événements</a>
            <a href="{{ route('events.create') }}" class="btn font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">Création d'un événement</a>
        </div>
    </x-slot>

    <div class="items-center max-w-3xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <h1 class="text-2xl font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-6">Créer un Événement</h1>
        <form action="{{ route('events.store') }}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Nom de l'Événement</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="name" name="name" required>
            </div>
            <div class="flex mb-4">
                <div class="mr-2">
                    <label for="date" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Date</label>
                    <input type="date" class="mt-1 p-2 w-36 border rounded-md" id="date" name="date" required>
                </div>
                <div class="mr-2">
                    <label for="time" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Heure</label>
                    <input type="time" class="mt-1 p-2 w-24 border rounded-md" id="time" name="time" required>
                </div>
            </div>
            <div class="mb-4">
                <label for="location" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Lieu</label>
                <input type="text" class="mt-1 p-2 w-full border rounded-md" id="location" name="location" required>
            </div>
            <div class="mb-6">
                <label for="description" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Description</label>
                <textarea class="mt-1 p-2 w-full border rounded-md" id="description" name="description" rows="4" required></textarea>
            </div>
            <button type="submit" class="btn-primary px-4 py-2 rounded-md bg-blue-500 text-white hover:bg-blue-700 focus:outline-none focus:ring focus:ring-blue-200">Créer l'Événement</button>
        </form>
    </div>
</x-app-layout>
