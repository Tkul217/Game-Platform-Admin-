<?php

namespace App\Repositories;

use App\Models\GameScore;

class GameScoreRepository
{
    public function delete(): void
    {
        GameScore::query()
            ->delete();
    }

    public function deleteByUserAndGame(int $userId, int $gameVersionId): void
    {
        GameScore::query()
            ->where('user_id', $userId)
            ->where('game_version_id', $gameVersionId)
            ->delete();
    }

    public function deleteByUser(int $userId): void
    {
        GameScore::query()
            ->where('user_id', $userId)
            ->delete();
    }
}
