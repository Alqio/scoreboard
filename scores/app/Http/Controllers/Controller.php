<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Score;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function index()
    {
        $games = Game::all()->all();
        return response($games);
    }

    public function scores(Request $request, Game $game)
    {
        $scores = $game->scores->all();

        $displayScores = [];
        foreach ($scores as $score) {
            $displayScores[] = $score->display();
        }

        return response($displayScores);
    }

    public function createGame(Request $request)
    {
        $data = $request->post();

        $game = new Game();
        $game->create($data);

        return $game;
    }

    public function addScore(Request $request, Game $game)
    {
        $data = $request->post();
        $data['game_id'] = $game->id;
        $score = new Score();

        $score->fill($data);
        $score->save();

        return $score;

    }

}
