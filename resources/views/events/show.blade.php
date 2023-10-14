<x-app-layout>
    <x-slot name="content">
    </x-slot>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <h1 class="text-2xl font-semibold mb-4">{{ $event->name }}</h1>
                        <p>Date: {{ $event->date }}</p>
                        <p>Heure: {{ $event->time }}</p>
                        <p>Lieu: {{ $event->location }}</p><br>
                        <p>Description: {{ $event->description }}</p>
                        <br>
                        @auth
                            @if($event->organizer_id !== auth()->user()->id)
                                <form action="{{ $event->participants->contains(auth()->user()) ? route('events.cancelParticipation', $event->id) : route('events.participate', $event->id) }}" method="POST">
                                    @csrf
                                    @if($event->participants->contains(auth()->user()))
                                        @method('DELETE')
                                        <p>Vous participez à événement.</p>
                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Retirer ma participation
                                            </button>
                                        </div>
                                    @else
                                        <div class="flex justify-end">
                                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                Participer
                                            </button>
                                        </div>
                                    @endif
                                </form>
                            @else
                                <div class="flex justify-end">
                                    <a href="{{ route('events.edit', $event->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                        Modifier
                                    </a>
                                </div>
                            @endif
                        @endauth
                    </div>
                </div>
            </div>

        </div>
</x-app-layout>
