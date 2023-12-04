<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class GameVersion extends Model
{
    use HasFactory;

    protected $fillable = [
        'game_id',
        'version_timestamp',
        'path',
    ];

    protected $casts = [
        'version_timestamp' => 'timestamp',
    ];

    public function game(): BelongsTo
    {
        return $this->belongsTo(Game::class);
    }

    public function gameScores(): HasMany
    {
        return $this->hasMany(GameScore::class);
    }
}
