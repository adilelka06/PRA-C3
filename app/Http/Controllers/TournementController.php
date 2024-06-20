<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournementController extends Controller
{
    public function index()
{
    $tournements = Tournement::all();
    return view('tournements.index', compact('tournements'));
}

public function create()
{
    return view('tournements.create');
}

public function store(Request $request)
{
    $request->validate([
        'naam' => 'required|string|max:255',
    ]);

    Tournement::create($request->all());

    return redirect()->route('tournements.index')->with('success', 'Toernooi aangemaakt.');
}

public function edit(Tournement $tournement)
{
    return view('tournements.edit', compact('tournement'));
}

public function update(Request $request, Tournement $tournement)
{
    $request->validate([
        'naam' => 'required|string|max:255',
    ]);

    $tournement->update($request->all());

    return redirect()->route('tournements.index')->with('success', 'Toernooi bijgewerkt.');
}

public function destroy(Tournement $tournement)
{
    $tournement->delete();

    return redirect()->route('tournements.index')->with('success', 'Toernooi verwijderd.');
}

}
