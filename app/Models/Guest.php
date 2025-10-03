<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'role',
        'country',
        'bio',
        'image',
        'order',
    ];

    protected $casts = [
        'order' => 'integer',
    ];

    public function sessions(): BelongsToMany
    {
        return $this->belongsToMany(Session::class)
            ->withPivot('role_in_session')
            ->withTimestamps();
    }

    public function getImageUrlAttribute(): ?string
    {
        if (!$this->image) {
            return asset('images/book.png'); // Default image
        }
        
        if (filter_var($this->image, FILTER_VALIDATE_URL)) {
            return $this->image;
        }
        
        return asset('storage/' . $this->image);
    }

    public function getCountryFlagAttribute(): ?string
    {
        $flags = [
            'Italy' => '🇮🇹',
            'Morocco' => '🇲🇦',
            'Tunisia' => '🇹🇳',
            'Spain' => '🇪🇸',
            'Albania' => '🇦🇱',
            'France' => '🇫🇷',
            'Greece' => '🇬🇷',
            'Turkey' => '🇹🇷',
        ];
        
        return $flags[$this->country] ?? null;
    }
}