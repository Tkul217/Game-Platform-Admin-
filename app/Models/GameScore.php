<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GameScore extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'game_version_id',
        'played_at',
        'score',
        'deleted_at'
    ];

    protected $casts = [
        'played_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];
}
