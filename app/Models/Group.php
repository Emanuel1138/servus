<?php

namespace App\Models;

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
            ->withPivot('is_coordinator');
    }

    public function coordinators()
    {
        return $this->users()->wherePivot('is_coordinator', true);
    }

    public function userIsCoordinator($userId)
    {
        return $this->users()
            ->wherePivot('user_id', $userId)
            ->wherePivot('is_coordinator', true)
            ->exists();
    }

    public function userIsMember($userId)
    {
        return $this->users()
            ->wherePivot('user_id', $userId)
            ->exists();
    }
}
