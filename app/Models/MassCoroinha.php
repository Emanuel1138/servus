<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MassCoroinha extends Model
{
    use HasFactory;

    protected $fillable = [
        'mass_schedule_id',
        'user_id',
    ];


    public function massSchedule()
    {
        return $this->belongsTo(MassSchedule::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
