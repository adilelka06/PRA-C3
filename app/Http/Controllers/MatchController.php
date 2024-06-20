<?php

namespace App\Http\Controllers;

use App\Models\Match;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matches = Match::all();
        return view('matches.index', compact('matches'));
    }

    public function show(Match $match)
    {
        return view('matches.show', compact('match'));
    }

    public function createMatch()
    {
        $teams = Team::inRandomOrder()->take(2)->get();

        if (count($teams) < 2) {
            return redirect()->route('matches.index')->with('error', 'Niet genoeg teams voor een wedstrijd.');
        }

        $match = Match::create([
            'team1_id' => $teams[0]->id,
            'team2_id' => $teams[1]->id,
        ]);

        return redirect()->route('matches.show', $match->id);
    }

    public function generateOutcome(Match $match)
    {
        $match->update([
            'score1' => rand(0, 5),
            'score2' => rand(0, 5),
        ]);

        return redirect()->route('matches.show', $match->id);
    }
}
