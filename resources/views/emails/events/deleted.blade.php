@component('mail::message')
    # Événement Supprimé

    Votre événement a été supprimé avec succès.

    ### Détails de l'événement :
    - **Nom de l'événement:** {{ $event->name }}
    - **Date:** {{ $event->date }}
    - **Heure:** {{ $event->time }}
    - **Lieu:** {{ $event->location }}
    - **Description:** {{ $event->description }}

    Merci d'utiliser notre service.

    Cordialement,<br>
    {{ config('app.name') }}
@endcomponent
