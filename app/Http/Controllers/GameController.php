<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameVersion;
use App\Repositories\GameRepository;
use App\Repositories\GameScoreRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    public function __construct(
        protected GameRepository $gameRepository,
        protected GameScoreRepository $gameScoreRepository
    )
    {
    }

    public function index(): View
    {
        $data = [];
        return view('games.index', [
            'games' => $data
        ]);
    }

    public function show(Game $game): View
    {
        return view('games.show', [
            'game' => $game
        ]);
    }

    public function showByVersions(Game $game, GameVersion $gameVersion): View
    {
        return view('games.show-versions', [
            'scores' => $gameVersion->with('gameScores', 'gameScores.user'),
            'game' => $game,
            'gameVersion' => $gameVersion
        ]);
    }

    public function delete(Game $game): RedirectResponse
    {
        $this->gameRepository->delete($game);

        return redirect()->route('game.index');
    }

    public function deleteScores(): RedirectResponse
    {
        $this->gameScoreRepository->delete();

        return redirect()->route('game.show');
    }

    public function deleteScoresByUserAndGame(Request $request, Game $game, GameVersion $gameVersion): RedirectResponse
    {
        $this->gameScoreRepository->deleteByUserAndGame($request->get('user_id'), $gameVersion->id);

        return redirect()->route('game.show-by-versions');
    }

    public function deleteScoresByUser(Request $request, Game $game): RedirectResponse
    {
        $this->gameScoreRepository->deleteByUser($request->get('user_id'));

        return redirect()->route('game.show-by-versions');
    }
}
