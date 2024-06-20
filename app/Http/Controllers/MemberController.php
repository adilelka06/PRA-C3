<?php
namespace App\Http\Controllers;

use App\Models\Member;
use App\Models\Team;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Member::with('team')->get();
        return view('members.index', compact('members'));
    }

    public function create()
    {
        $teams = Team::all();
        return view('members.create', compact('teams'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
        ]);

        Member::create($request->all());

        return redirect()->route('members.index')->with('success', 'Lid aangemaakt.');
    }

    public function edit(Member $member)
    {
        $teams = Team::all();
        return view('members.edit', compact('member', 'teams'));
    }

    public function update(Request $request, Member $member)
    {
        $request->validate([
            'naam' => 'required|string|max:255',
            'team_id' => 'required|exists:teams,id',
        ]);

        $member->update($request->all());

        return redirect()->route('members.index')->with('success', 'Lid bijgewerkt.');
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return redirect()->route('members.index')->with('success', 'Lid verwijderd.');
    }
}
