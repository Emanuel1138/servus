<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MassSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'daily_schedule_id',
        'church_name',
        'time',
    ];

    public function dailySchedule()
    {
        return $this->belongsTo(DailySchedule::class);
    }

    public function massCoroinhas()
    {
        return $this->hasMany(MassCoroinha::class);
    }


}
