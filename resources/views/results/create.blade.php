@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Nieuw Wedstrijdresultaat</h1>
    <form action="{{ route('results.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="tournement_id">Toernooi</label>
            <select class="form-control" id="tournement_id" name="tournement_id" required>
                @foreach($tournements as $tournement)
                    <option value="{{ $tournement->id }}">{{ $tournement->naam }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team1_id">Team 1</label>
            <select class="form-control" id="team1_id" name="team1_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="team2_id">Team 2</label>
            <select class="form-control" id="team2_id" name="team2_id" required>
                @foreach($teams as $team)
                    <option value="{{ $team->id }}">{{ $team->naam }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Opslaan</button>
    </form>
</div>
@endsection
