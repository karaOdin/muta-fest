<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'date',
        'order',
    ];

    protected $casts = [
        'date' => 'date',
        'order' => 'integer',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
    
    public function getSessionCountAttribute(): int
    {
        return $this->sessions()->count();
    }
}