<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'description',
        'event_date',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }
}
