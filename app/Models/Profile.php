<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'phone',
        'birth_date',
        'investiture_date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
