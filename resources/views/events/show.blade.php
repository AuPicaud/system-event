<x-app-layout>
    <x-slot name="header">
        <div class="flex align-items-center">
            <a href="{{ route('events.index') }}" class="btn font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight mb-0">Liste des événements</a>
            <a href="{{ route('events.create') }}" class="btn font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">Création d'un événement</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h2 class="text-2xl font-semibold mb-4">{{ $event->name }}</h2>
                    <p>Date: {{ $event->date }}</p>
                    <p>Heure: {{ $event->time }}</p>
                    <p>Lieu: {{ $event->location }}</p><br>
                    <p>Description: {{ $event->description }}</p>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
