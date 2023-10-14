<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

{{--    <div class="max-w-7xl mx-auto py-6 sm:px-6 lg:px-8">--}}
{{--        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">--}}
{{--            <div class="p-6 bg-white border-b border-gray-200">--}}
{{--                <h2 class="text-2xl font-semibold mb-4">Événements auxquels vous participez</h2>--}}
{{--                @forelse($participatedEvents as $event)--}}
{{--                    <div class="mb-4">--}}
{{--                        <h3 class="text-xl font-semibold mb-2">{{ $event->name }}</h3>--}}
{{--                        <p>Date: {{ $event->date }}</p>--}}
{{--                        <p>Heure: {{ $event->time }}</p>--}}
{{--                        <p>Lieu: {{ $event->location }}</p>--}}
{{--                        <p>Description: {{Str::limit($event->description, 100) }}</p>--}}
{{--                        <div class="flex justify-end">--}}
{{--                            <a href="{{ route('events.show', $event->id) }}" class="btn btn-primary">Détail</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @empty--}}
{{--                    <p>Vous ne participez à aucun événement pour le moment.</p>--}}
{{--                @endforelse--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
</x-app-layout>
