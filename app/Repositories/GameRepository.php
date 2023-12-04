<?php

namespace App\Repositories;

use App\Models\Game;

class GameRepository
{
    public function delete(Game $game): void
    {
        $game->delete();
    }
}
