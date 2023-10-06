<?php

namespace App\Http\Controllers;
use App\Models\Event;
use Illuminate\Http\Request;

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
        ]);

        // Redirigez l'utilisateur vers une page de confirmation ou la liste des événements
        return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');
    }

}
