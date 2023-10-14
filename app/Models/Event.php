<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(User::class);
    }

    public function organizer()
    {
        return $this->belongsTo(User::class);
    }

}
