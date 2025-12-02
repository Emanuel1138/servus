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

    public static function boot()
    {
        parent::boot();

        static::creating(function ($formation) {
            if (empty($formation->slug)) {
                $formation->slug = Str::slug($formation->title);
            }
        });

        static::updating(function ($formation) {
            if ($formation->isDirty('title')) {
                $formation->slug = Str::slug($formation->title);
            }
        });
    }

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function lastEditor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }
}