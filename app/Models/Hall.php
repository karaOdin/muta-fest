<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hall extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'capacity',
        'description',
        'floor',
    ];

    protected $casts = [
        'capacity' => 'integer',
    ];

    public function sessions(): HasMany
    {
        return $this->hasMany(Session::class);
    }
}