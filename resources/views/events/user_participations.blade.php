<x-app-layout>
    <x-slot name="header">
        <div class="flex align-items-center">
            <a href="{{ route('user.participations') }}" class="btn font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight ml-3">Mes participations</a>
        </div>
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @if(count($participatedEvents) > 0)
                    @foreach($participatedEvents as $event)
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                            <div class="p-6 text-gray-900 dark:text-gray-100">
                                <h2 class="text-xl font-semibold mb-2">{{ $event->name }}</h2>
                                <p>Date: {{ $event->date }}</p>
                                <p>Heure: {{ $event->time }}</p>
                                <p>Lieu: {{ $event->location }}</p>
                                <p>Description: {{ Str::limit($event->description, 100) }}</p>
                                <!-- Ajoutez d'autres détails de l'événement si nécessaire -->
                                <div class="flex justify-end">
                                    <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Détail</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p class="text-xl text-gray-800 dark:text-gray-200">Vous ne participez à aucun événement pour le moment.</p>
                @endif
            </div>
        </div>
</x-app-layout>
