<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DailySchedule extends Model
{
    use HasFactory;

    protected $fillable = [
        'weekly_schedule_id',
        'day',
    ];

    public function weeklySchedule()
    {
        return $this->belongsTo(WeeklySchedule::class);
    }

    public function massSchedules()
    {
        return $this->hasMany(MassSchedule::class);
    }

}
