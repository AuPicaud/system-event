<?php

namespace App\Listeners;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Events\EventCreated;

class EventCreatedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param EventCreated $event
     * @return void
     */
    public function handle(EventCreated $event)
    {
        // Accéder à l'événement crée à partir de $event
        $createdEvent = $event->event;

        // Afficher une pop-up de notification après le chargement complet de la page
        echo "<script>alert('Événement $createdEvent->name créé avec succès!');</script>";
    }
}
