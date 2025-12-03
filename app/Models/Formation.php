<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Formation extends Model
{
    use HasFactory;

    protected $fillable = [
        'group_id',
        'title',
        'slug',
        'body_html',
        'body_delta',
        'is_public',
        'last_edited_by',
    ];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function lastEditor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }

    protected static function booted()
    {
        static::creating(function ($formation) {
            if (!$formation->slug) {
                $formation->slug = Str::slug($formation->title);
            }
        });

        static::updating(function ($formation) {
            $formation->slug = Str::slug($formation->title);
        });
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}