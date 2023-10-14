<x-app-layout>
    <x-slot name="content">
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                @foreach($events as $event)
                    <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-4">
                        <div class="p-6 text-gray-900 dark:text-gray-100">
                            <h2 class="text-xl font-semibold mb-2">{{ $event->name }}</h2>
                            <p>Date: {{ $event->date }}</p>
                            <p>Heure: {{ $event->time }}</p>
                            <p>Lieu: {{ $event->location }}</p>
                            <p>Description: {{Str::limit($event->description, 100) }}</p>
                            <div class="flex justify-end">
                                <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Détail</a>
                            </div>
                        </div>
                    </div>
                @endforeach
                {{ $events->links() }}
            </div>
        </div>

</x-app-layout>
