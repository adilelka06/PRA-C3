<?php

namespace App\Http\Controllers;

use App\Models\Matches;
use App\Models\Team;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    public function index()
    {
        $matcheses = Matches::all();
        return view('matches.index', compact('matches'));
    }

    public function show(Matches $matches)
    {
        return view('matches.show', compact('matches'));
    }

    public function createMatches()
    {
        $teams = Team::inRandomOrder()->take(2)->get();

        if (count($teams) < 2) {
            return redirect()->route('matches.index')->with('error', 'Niet genoeg teams voor een wedstrijd.');
        }

        $matches = Matches::create([
            'team1_id' => $teams[0]->id,
            'team2_id' => $teams[1]->id,
        ]);

        return redirect()->route('matches.show', $matches->id);
    }

    public function generateOutcome(Matches $matches)
    {
        $matches->update([
            'score1' => rand(0, 5),
            'score2' => rand(0, 5),
        ]);

        return redirect()->route('matches.show', $matches->id);
    }
}
