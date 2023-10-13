<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }


    public function create()
    {
        return view('events.create_event');
    }

    public function store(Request $request)
    {
        // Validez les données du formulaire
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'location' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        // Créez un nouvel événement dans la base de données
        Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'time' => $request->time,
            'location' => $request->location,
            'description' => $request->description,
            'organizer_id' => auth()->user()->id,
        ]);

        // Redirigez l'utilisateur vers une page de confirmation ou la liste des événements
        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function participate($id)
    {
        if (auth()->check()) {
            $event = Event::findOrFail($id);
            $user = auth()->user();

            // Vérifier si l'utilisateur participe déjà à l'événement
            if (!$event->participants->contains($user)) {
                $event->participants()->attach($user);
                return redirect()->route('events.show', $id)->with('success', 'Vous participez maintenant à cet événement!');
            }

            return redirect()->route('events.show', $id)->with('error', 'Vous avez déjà participé à cet événement.');
        }

        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour participer à cet événement.');
    }

    public function cancelParticipation($id)
    {
        if (auth()->check()) {
            $event = Event::findOrFail($id);
            $user = auth()->user();

            // Vérifier si l'utilisateur participe à l'événement
            if ($event->participants->contains($user)) {
                $event->participants()->detach($user);
                return redirect()->route('events.show', $id)->with('success', 'Vous ne participez plus à cet événement.');
            }

            return redirect()->route('events.show', $id)->with('error', 'Vous ne participez pas à cet événement.');
        }

        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour retirer votre participation à cet événement.');
    }
}
