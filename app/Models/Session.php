<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Session extends Model
{
    use HasFactory;
    
    protected $table = 'festival_sessions';

    protected $fillable = [
        'day_id',
        'hall_id',
        'title',
        'description',
        'start_time',
        'end_time',
        'order',
    ];

    protected $casts = [
        'start_time' => 'datetime:H:i',
        'end_time' => 'datetime:H:i',
        'order' => 'integer',
    ];

    public function day(): BelongsTo
    {
        return $this->belongsTo(Day::class);
    }

    public function hall(): BelongsTo
    {
        return $this->belongsTo(Hall::class);
    }

    public function guests(): BelongsToMany
    {
        return $this->belongsToMany(Guest::class)
            ->withPivot('role_in_session')
            ->withTimestamps();
    }

    public function getTimeRangeAttribute(): string
    {
        return date('H:i', strtotime($this->start_time)) . ' - ' . date('H:i', strtotime($this->end_time));
    }
    
    public function getDurationAttribute(): string
    {
        $start = strtotime($this->start_time);
        $end = strtotime($this->end_time);
        $diff = $end - $start;
        
        $hours = floor($diff / 3600);
        $minutes = floor(($diff % 3600) / 60);
        
        if ($hours > 0 && $minutes > 0) {
            return $hours . 'h ' . $minutes . 'min';
        } elseif ($hours > 0) {
            return $hours . ' ore';
        } else {
            return $minutes . ' minuti';
        }
    }
}