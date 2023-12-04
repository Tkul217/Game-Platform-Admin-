<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
