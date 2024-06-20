<?php
namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Team;
use App\Models\Tournement;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Result::with('team1', 'team2', 'tournement')->get();
        return view('results.index', compact('results'));
    }

    public function create()
    {
        $teams = Team::all();
        $tournements = Tournement::all();
        return view('results.create', compact('teams', 'tournements'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tournement_id' => 'required|exists:tournements,id',
            'team1_id' => 'required|exists:teams,id',
            'team2_id' => 'required|exists:teams,id',
        ]);

        $result = new Result();
        $result->tournement_id = $request->tournement_id;
        $result->team1_id = $request->team1_id;
        $result->team2_id = $request->team2_id;
        $result->team1_score = rand(0, 5);  // Random score for demonstration
        $result->team2_score = rand(0, 5);  // Random score for demonstration
        $result->save();

        return redirect()->route('results.index')->with('success', 'Wedstrijdresultaat aangemaakt.');
    }

    public function destroy(Result $result)
    {
        $result->delete();

        return redirect()->route('results.index')->with('success', 'Wedstrijdresultaat verwijderd.');
    }
}
