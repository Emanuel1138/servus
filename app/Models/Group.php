<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;

    protected $fillable = [
        'parash',
        'diocese',
        'city',
        'state',
        'access_key',
        'owner_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }
    public function users()
    {
        return $this->belongsToMany(User::class)
            ->withPivot('is_coordinator')
            ->withTimestamps();
    }

    public function countUsers()
    {
        return $this->users()->count();
    }
}
