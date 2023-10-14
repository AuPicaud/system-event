<x-app-layout>
    <x-slot name="content">
    </x-slot>
        <div class="max-w-4xl mx-auto mt-10 sm:px-6 lg:px-8">
            <div class="bg-gray-800 dark:bg-gray-900 overflow-hidden shadow-sm sm:rounded-lg text-white">
                <div class="p-6 border-b border-gray-600">
                    <h2 class="text-2xl font-semibold mb-4">Modifier l'événement</h2>

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('events.update', $event->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="nom" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Nom de l'événement</label>
                            <input type="text" id="name" name="name" class="mt-1 p-2 w-full border rounded dark:bg-gray-900" value="{{ old('name', $event->name) }}">
                        </div>

                        <div class="mb-4">
                            <label for="date" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Date</label>
                            <input type="date" id="date" name="date" class="mt-1 p-2 w-full border rounded dark:bg-gray-900 text-white date-picker" value="{{ old('date', $event->date) }}">
                        </div>

                        <div class="mb-4">
                            <label for="heure" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Heure</label>
                            <input type="time" id="time" name="time" class="mt-1 p-2 w-full border rounded dark:bg-gray-900 text-white time-picker" value="{{ old('time', $event->time) }}">
                        </div>

                        <div class="mb-4">
                            <label for="lieu" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Lieu</label>
                            <input type="text" id="location" name="location" class="mt-1 p-2 w-full border rounded dark:bg-gray-900" value="{{ old('location', $event->location) }}">
                        </div>

                        <div class="mb-4">
                            <label for="description" class="block text-sm font-medium text-gray-600 dark:text-gray-400">Description de l'événement</label>
                            <textarea id="description" name="description" rows="5" class="mt-1 p-2 w-full border rounded dark:bg-gray-900"> {{ old('description', $event->description) }}</textarea>
                        </div>

                        <div class="mb-4 flex justify-between">
                            <button type="submit" class="bg-gray-300 text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded hover:bg-gray-400">
                                Mettre à jour l'événement
                            </button>

                            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-gray-300 text-gray-800 dark:text-gray-200 font-bold py-2 px-4 rounded hover:bg-gray-400">
                                    Supprimer l'événement
                                </button>
                            </form>
                        </div>

                    </form>
                </div>
            </div>
        </div>
</x-app-layout>
