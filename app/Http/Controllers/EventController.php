<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Events\EventCreated;
use App\Mail\EventDeleted;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Gate;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::paginate(5);
        return view('events.index', compact('events'));
    }


    public function create()
    {
        return view('events.create_event');
    }

    public function store(Request $request)
    {
        // Vérifiez si l'utilisateur est authentifié

            // Validez les données du formulaire
            $request->validate([
                'name' => 'required|string|max:255',
                'date' => 'required|date',
                'time' => 'required|date_format:H:i',
                'location' => 'required|string|max:255',
                'description' => 'required|string',
            ]);

            $user = auth()->user();

            // Créez un nouvel événement dans la base de données
            $event = Event::create([
                'name' => $request->name,
                'date' => $request->date,
                'time' => $request->time,
                'location' => $request->location,
                'description' => $request->description,
                'organizer_id' => $user->id,
            ]);

            event(new EventCreated($event));

            // Redirigez l'utilisateur vers une page de confirmation ou la liste des événements
            return redirect()->route('events.index')->with('success', 'Événement créé avec succès.');

    }

    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        // Vérifiez si l'utilisateur est autorisé à mettre à jour l'événement.
        if (Gate::denies('update', $event)) {
            abort(403, 'Accès non autorisé');
        }

        // Mettez à jour l'événement ici.
        $event->update([
            'name' => $request->input('name'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'location' => $request->input('location'),
            'description' => $request->input('description'),
        ]);

        return redirect()->route('events.index')->with('success', 'Événement mis à jour avec succès.');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);

        $event->users()->detach();

        // Vérifiez si l'événement a un utilisateur associé avant d'envoyer l'e-mail
        if ($event->user) {
            // Envoyer l'e-mail avant la suppression
            Mail::to($event->user->email)->send(new EventDeleted());
        }

        $event->delete();

        return redirect()->route('events.index')->with('success', 'Événement supprimé avec succès.');
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

    public function userParticipations()
    {
        if (auth()->check()) {
            $user = auth()->user();
            $participatedEvents = $user->participatedEvents ?? [];
            return view('events.user_participations', compact('participatedEvents'));
        }

        return redirect()->route('login')->with('error', 'Veuillez vous connecter pour accéder à vos participations.');
    }


}
