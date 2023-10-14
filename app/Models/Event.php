<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'time',
        'location',
        'description',
        'organizer_id',
    ];

    public function participants()
    {
        return $this->belongsToMany(User::class, 'event_user');
    }

    public function organizer()
    {
        return $this->belongsTo(User::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'event_user'); // Assurez-vous d'ajuster le nom de la table pivot si nécessaire
    }

}
